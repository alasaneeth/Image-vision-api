<?php

namespace App\Http\Controllers\Courier_Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Enums\TransactionCode;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Courier_Models\Courier;

class CourierController extends Controller
{

    public function index()
    {
        try {
            $couriers = Courier::select(
                'code',
                'name',
                'contactNo',
                'nic',
                'address'
            )
             ->get();
            return response()->json([
                'status' => 200,
                'courier' => $couriers
            ]);
        } catch (\Exception $e) {
            throw new Exception($e);
        }
    }

    public function create()
    {
    }

    public function show($id)
    {
        try {

            $courier = Courier::select(
                'code',
                'name',
                'contactNo',
                'nic',
                'address'

            )
                ->where('code', $id)
                ->first();
            return response()->json([
                'status' => 200,
                'courier' => $courier,
                //'customerAddress'=>$customerAddress

            ]);
        } catch (\Exception $e) {
            throw new Exception($e);
        }
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
    
        try {
            $courier_code = TransactionCode::COURIER;
            $cuo_code = Courier::max('code');
            $max_id = $cuo_code == null ? config('global.code_value') + 1 : substr("$cuo_code", 3) + 1;
    
            $courier = Courier::create([
                'code' => $courier_code . $max_id,
                'name' => $request->name,
                'contactNo' => $request->contactNo,
                'nic'=>$request->nic,
                'address'=> $request->address,
                'created_at' => getDateTimeNow(),
                'updated_at' => getDateTimeNow(),
            ]);
    
            DB::commit();
            return response()->json([
                'status' => 200,
                'message' => "Courier Created",
                'code' => $courier_code . $max_id,
            ], 200);
    
        } catch (Exception $e) {
            DB::rollBack();
            throw new Exception($e);
        }
    }

    public function update(Request $request, $id)
    {

        try {
            DB::beginTransaction();

            $courier = Courier::select('id', 'code')->where('code', $id)->first();
            $courier->update([
                'name' => $request->name,
                'contactNo' => $request->contactNo,
                'nic'=>$request->nic,
                'address'=> $request->address,
                'updated_at' => getDateTimeNow(),

            ]);
                DB::commit();
                return response()->json([
                    'status' => 200,
                    'message' => "Courier Updated",

                ], 200);
            
        } catch (\Exception $e) {

            DB::rollBack();
            throw new Exception($e);
        }
    }

    public function courierSearch($key)
    {
        // try {

            $courier = Courier::select(
                'code',
                'name',
                'contactNo',
                'nic',
                'address'
            )
              
                ->where(function ($query) use ($key) {
                    $query->Where('code', 'like', "%$key%")
                                  ->orWhere('name', 'like', "%$key%");
                      
                })
                ->get();

            return response()->json([
                'status' => 200,
                'courier' => $courier
            ]);
        // } catch (\Exception $e) {
        //     throw new Exception($e);
        // }
    }


    public function destroy($id)
    {
        try {
            DB::beginTransaction();
    
            $courier = Courier::where('code', $id)->first();
    
            if (!$courier) {
                return response()->json([
                    'status' => 404,
                    'message' => 'courier not found',
                ], 404);
            }

            $courier->delete();
            DB::commit();
            return response()->json([
                'status' => 200,
                'message' => 'Customer deleted successfully',
            ], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            throw new Exception($e);
        }
    }
    
}
