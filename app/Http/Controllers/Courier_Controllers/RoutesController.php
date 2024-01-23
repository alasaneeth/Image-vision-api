<?php

namespace App\Http\Controllers\Courier_Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Enums\TransactionCode;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Courier_Models\Routes;

class RoutesController extends Controller
{

    public function index()
    {
        try {
            $routes = Routes::select(
                'code',
                'route_name',
                'courier_code',
                'from' ,
                'to',
                'created_at',
                'updated_at', 
            ) ->with([
                'courier' => function ($query) {}
            ])
             ->get();
            return response()->json([
                'status' => 200,
                'routes' => $routes
            ]);
        } catch (\Exception $e) {
            throw new Exception($e);
        }
    }

    public function show($id)
    {
        try {

            $routes = Routes::select(
                'code',
                'route_name',
                'courier_code',
                'from' ,
                'to',
                'created_at',
                'updated_at', 

             ) ->with([
                'courier' => function ($query) {}
            ])
                ->where('code', $id)
                ->first();
            return response()->json([
                'status' => 200,
                'routes' => $routes,

            ]);
        } catch (\Exception $e) {
            throw new Exception($e);
        }
    }


    public function store(Request $request)
    {
        DB::beginTransaction();
    
        try {
            $route_code = TransactionCode::ROUTE;
            $rou_code = Routes::max('code');
            $max_id = $rou_code == null ? config('global.code_value') + 1 : substr("$rou_code", 3) + 1;
    
            $courier = Routes::create([
                'code' => $route_code . $max_id,
                'route_name' => $request->routeName,
                'courier_code' => $request->courier['code'],
                'from' => $request->from,
                'to'=>$request->to,
                'created_at' => getDateTimeNow(),
                'updated_at' => getDateTimeNow(),
            ]);
    
            DB::commit();
            return response()->json([
                'status' => 200,
                'message' => "Route is Created",
                'code' => $route_code . $max_id,
            ], 200);
    
        } catch (Exception $e) {
            DB::rollBack();
            throw new Exception($e);
        }
    }

    public function routeSearchSearch($key)
    {
        // try {

            $routes = Routes::select(
                'code',
                'route_name',
                'courier_code',
                'from' ,
                'to',
                'created_at',
                'updated_at', 
            )->with([
                'courier' => function ($query) {}
            ])
              
                ->where(function ($query) use ($key) {
                    $query->Where('code', 'like', "%$key%")
                                  ->orWhere('route_name', 'like', "%$key%");
                      
                })
                ->get();

            return response()->json([
                'status' => 200,
                'routes' => $routes
            ]);
        // } catch (\Exception $e) {
        //     throw new Exception($e);
        // }
    }

      public function update(Request $request, $id)
    {

        try {
            DB::beginTransaction();

            $route = Routes::select('id', 'code')->where('code', $id)->first();
            $route->update([
                'route_name' => $request->routeName,
                'courier_code' => $request->courier['code'],
                'from' => $request->from,
                'to'=>$request->to,
                'updated_at' => getDateTimeNow(),

            ]);
                DB::commit();
                return response()->json([
                    'status' => 200,
                    'message' => "Route Updated",

                ], 200);
            
        } catch (\Exception $e) {

            DB::rollBack();
            throw new Exception($e);
        }
    }

    public function destroy($id)
    {
        try {
            DB::beginTransaction();
    
            $courier = Routes::where('code', $id)->first();
    
            if (!$courier) {
                return response()->json([
                    'status' => 404,
                    'message' => 'Route not found',
                ], 404);
            }

            $courier->delete();
            DB::commit();
            return response()->json([
                'status' => 200,
                'message' => 'Route deleted successfully',
            ], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            throw new Exception($e);
        }
    }
}
