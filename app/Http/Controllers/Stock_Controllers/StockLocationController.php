<?php

namespace App\Http\Controllers\Stock_Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Stock_Models\StockLocation;
use App\Enums\TransactionCode;
use Illuminate\Support\Facades\DB;

class StockLocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $location  = StockLocation::select('code','name')->get();
            return response()->json(['status' => 200, 'stockLocation' =>  $location ]);
        }catch (\Exception $e) {
            return response()->json([
                'status'=> 500,
                'message'=> $e
            ],500);
        }
    }

    public function show($id)
    {
        try {

            $location = StockLocation::select(
                'code',
                'name'
            )
                ->where('code', $id)
                ->first();
            return response()->json([
                'status' => 200,
                'stockLocation' => $location,
                //'customerAddress'=>$customerAddress

            ]);
        } catch (\Exception $e) {
            throw new Exception($e);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

   
    public function store(Request $request)
    {
        try{

            $loc_code =TransactionCode::STOCK_LOCATION;
            $cus_code = StockLocation::max('code');
            $max_id= $cus_code==null ? config('global.code_value')+1 : substr("$cus_code",3)+1;

            $stockLocation = StockLocation::create([

                'code'=> $loc_code.$max_id,
                'name'=> $request->name,
                'created_by' => getUserCode(),
                'created_at' => getDateTimeNow(),
                'updated_by' => getUserCode(),
                'updated_at' => getDateTimeNow(),

            ]);
           // return response()->json(['status' => 200, 'Stock Location' =>  $stockLocation ]);
            return response()->json(['status' => 200, 'message'=>"Stock Location Created" ]);

        }catch (\Exception $e) {
            return response()->json([
                'status'=> 500,
                'message'=> $e
            ],500);
        }
    }

   
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {

        try {
            DB::beginTransaction();

            $customer = StockLocation::select('id', 'code')->where('code', $id)->first();
            $customer->update([
                'name' => $request->name,
                'updated_at' => getDateTimeNow(),

            ]);
                DB::commit();
                return response()->json([
                    'status' => 200,
                    'message' => "Location Updated Updated",

                ], 200);
            
        } catch (\Exception $e) {

            DB::rollBack();
            throw new Exception($e);
        }
    }

    public function locationSerach($key)
    {
        // try {

            $location = StockLocation::select(
                'code',
                'name'
            )
              
                ->where(function ($query) use ($key) {
                    $query->Where('code', 'like', "%$key%")
                                  ->orWhere('name', 'like', "%$key%");
                      
                })
                ->get();

            return response()->json([
                'status' => 200,
                'location' => $location
            ]);
        // } catch (\Exception $e) {
        //     throw new Exception($e);
        // }
    }


    public function destroy($id)
    {
        try {
            DB::beginTransaction();
    
            $location = StockLocation::where('code', $id)->first();
    
            if (!$location) {
                return response()->json([
                    'status' => 404,
                    'message' => 'Location not found',
                ], 404);
            }

    
            $location->delete();
    
            DB::commit();
            
            return response()->json([
                'status' => 200,
                'message' => 'Location deleted successfully',
            ], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            throw new Exception($e);
        }
    }

}
