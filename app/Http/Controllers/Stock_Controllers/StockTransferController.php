<?php

namespace App\Http\Controllers\Stock_Controllers;
use App\Enums\LockedStatus;
use App\Enums\SourceCode;
use App\Enums\StockHistorySource;
use App\Enums\TransactionCode;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Function_Controllers\StockFunction;
use App\Http\Controllers\Function_Controllers\StockHistoryFunction;
use App\Models\Stock_Models\StockTransfer;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Stock_Models\Stock;

class StockTransferController extends Controller
{
    private $stock_history_function;
    private $stock_function;
    public function __construct()
    {
        $this->stock_history_function = new StockHistoryFunction();
        $this->stock_function = new StockFunction();

    }

    /**
     * index
     * Author: Suhail Jamaldeen
     * Date: 19.12.2022
     * Version: 01
     * Logic: Get all the stock which is trasferred
     *
     * Author: Suhail Jamaldeen
     * Date: 06.01.2023
     * Version: 02
     * Logic: Get all the transferred stock filter by
     * location from code current logged in code
     * @return void
     */
    public function index(Request $request)
    {
        try {

            try {
                $stockTransfer = StockTransfer::
                    where('is_active', '=', 1)
                    ->where('stock_location_code_from', '=', getCurrentLocationCode($request))
                    ->get();

                return response()->json(['
                status' => 200,
                    'stockTransfer' => $stockTransfer
                ]);
            } catch (\Exception $e) {
                return response()->json([
                    'status' => 500,
                    'message' => $e
                ], 500);
            }

        } catch (\Exception $e) {
            throw new Exception($e);
        }
    }


    public function show($id)
    {
        try {

            $stockTransfer = StockTransfer::select(
                'code',
                'stock_location_code_from AS fromCode',
                'stock_location_code_to AS toCode',
                'transfer_date_time',
                'remarks',
                'is_locked',
                'created_at'
            )
                ->with([
                    'stockHistories' => function ($query) {
                        $query->where('is_active', '=', 1)
                            ->where('source', '=', StockHistorySource::STOCK_TRANSFER_FROM)
                        ;
                    },
                    'stockHistories.itemMaster' => function ($query) {
                        $query->where('is_active', '=', 1);
                    },

                ])
                ->where('is_active', '=', 1)
                ->where('code', '=', $id)
                ->first();
            return response()->json(['status' => 200, 'stockTransfer' => $stockTransfer]);
        } catch (\Exception $e) {
            throw new Exception($e);
        }
    }

    public function create()
    {
        //
    }


    /**
     * store
     *
     * Author: Suhail Jamaldeen
     * Version: 01
     * Date: 19.12.2022
     * Logic: Store stock transfer update the stock table and create a new row in stock for to location
     * @param  mixed $request
     * @return void
     */
    public function store(Request $request)
    {
        try {
            $stock_history = $request->stockHistories;
            if (count($stock_history) > 0) {

                DB::beginTransaction();

                $transfer_code = TransactionCode::STOCK_TRANSFER;
                $stockLocationCode = getCurrentLocationCode($request);
                $locationPrefix = substr("$stockLocationCode", -2);
                $max_code = StockTransfer::select('code')
                    ->where('stock_location_code_from', '=', $stockLocationCode)
                    ->max('code');

                $max_id = $max_code == null || $max_code == '' ? config('global.code_value') + 1 : substr("$max_code", 5) + 1;

                $stockTransfer = StockTransfer::create([
                    'code' => $transfer_code . $locationPrefix . $max_id,
                    'stock_location_code_from' => $stockLocationCode,
                    'stock_location_code_to' => $request->toCode,
                    'transfer_date_time' => getDateTimeNow(),
                    'remarks' => $request->remarks,
                    'updated_by' => getUserCode(),
                    'updated_at' => getDateTimeNow(),
                    'created_by' => getUserCode(),
                    'created_at' => getDateTimeNow(),

                ]);

                if ($stockTransfer) {
                    if (config('setting.is_batch_enabled')) {
                        foreach ($stock_history as $stockHistory) {
                            $stockFrom = $this->stock_function->getExistingStock($stockHistory['stockCode']);
                            $remainingQuantityFrom = ($stockFrom->remaining_quantity) - ($stockHistory['quantity']);
                            $stockFrom->update([
                                'remaining_quantity' => $remainingQuantityFrom,
                                'updated_by' => getUserCode(),
                                'updated_at' => getDateTimeNow()
                            ]);
                            $this->stock_history_function->addStockHistoryForStockTransfer($stockHistory, $stockTransfer->code, StockHistorySource::STOCK_TRANSFER_FROM, $stockFrom);

                            //Add row in stock Table. Stock Transfer creates rows in
                            $stockTo = $this->stock_function->createStock($stockHistory, $stockFrom->grn_code, $stockTransfer->stock_location_code_to);

                            $this->stock_history_function->addStockHistoryForStockTransfer($stockHistory, $stockTransfer->code, StockHistorySource::STOCK_TRANSFER_TO, $stockTo);
                        }
                    } else {
                        foreach ($stock_history as $stockHistory) {

                            $stockFrom = Stock::where(
                                'item_code',
                                '=',
                                $stockHistory['itemCode'] ?? $stockHistory['itemMaster']['code']
                            )
                                ->where(
                                    'stock_location_code',
                                    '=',
                                    getCurrentLocationCode($request)
                                )
                                ->where('is_freeze', '=', 0)
                                ->first();

                            $remainingQuantityFrom = ($stockFrom->remaining_quantity) - ($stockHistory['quantity']);
                            $stockFrom->update([
                                'remaining_quantity' => $remainingQuantityFrom,
                                'updated_by' => getUserCode(),
                                'updated_at' => getDateTimeNow()
                            ]);
                            $this->stock_history_function->addStockHistoryForStockTransfer($stockHistory, $stockTransfer->code, StockHistorySource::STOCK_TRANSFER_FROM, $stockFrom);

                            //Add row in stock Table. Stock Transfer creates rows in
                            $stockTo = $this->stock_function->updateOrCreateStock($stockHistory, $stockFrom->grn_code, $stockTransfer->stock_location_code_to);

                            $this->stock_history_function->addStockHistoryForStockTransfer($stockHistory, $stockTransfer->code, StockHistorySource::STOCK_TRANSFER_TO, $stockTo);
                        }
                    }

                }

                DB::commit();
                return response()->json(
                    [
                        'status' => 200,
                        'message' => "Stock Transfer Created"
                    ],
                    200
                );
            } else {
                return response()->json(
                    [
                        'status' => 200,
                        'message' => "No Items in Stock Transfer"
                    ],
                    200
                );
            }
        } catch (\Exception $e) {
            DB::rollBack();
            throw new Exception($e);
        }
    }


    public function edit($id)
    {
    }


    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();

            $stockTransfer = StockTransfer::where('code', $id)->first();
            $stockTransfer->update([
                'stock_location_code_from' => $request->fromCode,
                'stock_location_code_to' => $request->toCode,
                'remarks' => $request->remarks,
                'updated_by' => getUserCode(),
                'updated_at' => getDateTimeNow(),
            ]);

            if ($stockTransfer) {
                $stock_history = $request->stockHistories;

                if ($stockTransfer->stock_location_code_from) {
                    if (count($stock_history) > 0) {
                        foreach ($stock_history as $stockHistory) {
                            $stockHistory['locationCode'] = $stockTransfer->stock_location_code_from;
                            $stockFrom = $this->stock_function->getExistingStock($stockHistory['stockCode']);
                            $remainingQuantity = $stockFrom->remaining_quantity - $stockHistory['quantity'];
                            $stockFrom->update([
                                'remaining_quantity' => $remainingQuantity,
                                'updated_by' => getUserCode(),
                                'updated_at' => getDateTimeNow()
                            ]);
                            //  $this->stock_history_function->updateStockHistoryForStockTransfer($stockHistory, $stockTransfer->code, $stockTransfer->location_code_from, StockHistorySource::STOCK_TRANSFER_FROM, $stockFrom);
                        }
                    }
                }
                if ($stockTransfer->location_code_to) {
                    if (count($stock_history) > 0) {
                        foreach ($stock_history as $stockHistory) {
                            $stockHistory['locationCode'] = $stockTransfer->location_code_to;
                            $stockTo = $this->stock_function->getExistingStock($stockHistory['stockCode']);
                            $remainingQuantity = $stockTo->remaining_quantity + $stockHistory['quantity'];
                            $stockTo->update([
                                'remaining_quantity' => $remainingQuantity,
                                'updated_by' => getUserCode(),
                                'updated_at' => getDateTimeNow()
                            ]);
                            // $this->stock_history_function->updateStockHistoryForStockTransfer($stockHistory, $stockTransfer->code, $stockTransfer->location_code_to, StockHistorySource::STOCK_TRANSFER_TO, $stockTo);
                        }
                    }
                }
            }

            DB::commit();
            return response()->json([
                'status' => 200,
                'message' => "Stock Transfer Updated",

            ], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            throw new Exception($e);
        }
    }

    public function stockTransferLocked(Request $request)
    {
         try {
            $code = $request->code;
            $stockTransfer = stockTransfer::where('code', '=', $code)
                ->where('is_locked', '=', 0)
                ->where('is_active', '=', 1)
                ->first();

            $stockTransfer->update([
                'is_locked' => LockedStatus::LOCKED,
            ]);

            return response()->json(
                [
                    'status' => 200,
                    'stockIn' => $stockTransfer,
                    'message' => 'Stock Trasnfer has locked',
                ]
            );

        } catch (\Exception $e) {
            throw new Exception($e);
        }
    }


    public function destroy($id)
    {
        try {
            $stockTransfer = StockTransfer::select('id', 'is_active')->where('code', $id)->where('is_active', '=', 1)->first();
            $stockTransfer->update([
                'is_active' => 0
            ]);
            return response()->json([
                'status' => 204,
                'message' => "Stock Transfer- Deleted"
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 500,
                'message' => $e
            ], 500);
        }
    }
}