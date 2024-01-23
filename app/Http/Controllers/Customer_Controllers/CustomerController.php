<?php

namespace App\Http\Controllers\Customer_Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json;
use App\Models\Customer_Models\Customer;
use App\Models\Stock_Models\Route;
use App\Models\Customer_Models\CustomerType;
use App\Models\Stock_Models\SalesRep;
use App\Models\Customer_Models\CustomerAddress;
use App\Models\Customer_Models\CustomerContact;
use App\Enums\TransactionCode;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class CustomerController extends Controller
{

    public function index()
    {
        try {
            $customers = Customer::select(
                'code',
                'first_name',
                'last_name',
                'nic',
                'phone',
                'address'
            )
             ->get();
            return response()->json([
                'status' => 200,
                'customer' => $customers
            ]);
        } catch (\Exception $e) {
            throw new Exception($e);
        }
    }


    public function customerSearch($key)
    {
        try {

            $customers = Customer::select(
                'customers.code',
                'first_name',
                'last_name',
                'nic',
                'phone',
                'address'
            )
              
                ->where(function ($query) use ($key) {
                    $query->Where('customers.code', 'like', "%$key%")
                                  ->orWhere('customers.first_name', 'like', "%$key%")
                                  ->orWhere('customers.last_name', 'like', "%$key%");
                      
                })
                ->get();

            return response()->json([
                'status' => 200,
                'customer' => $customers
            ]);
        } catch (\Exception $e) {
            throw new Exception($e);
        }
    }

    public function show($id)
    {
        try {

            $customer = Customer::select(
                'code',
                'first_name',
                'last_name',
                'nic',
                'phone',
                'address',

            )
                ->where('code', $id)
                ->first();
            return response()->json([
                'status' => 200,
                'customer' => $customer,
                //'customerAddress'=>$customerAddress

            ]);
        } catch (\Exception $e) {
            throw new Exception($e);
        }
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
    
        try {
            $customer_code = TransactionCode::CUSTOMER_CODE;
            $cus_code = Customer::max('code');
            $max_id = $cus_code == null ? config('global.code_value') + 1 : substr("$cus_code", 3) + 1;
    
            $customer = Customer::create([
                'code' => $customer_code . $max_id,
                'first_name' => $request->firstName,
                'last_name' => $request->lastName,
                'nic'=> $request->nic,
                'phone' => $request->phone,
                'address' => $request->address,
                'created_at' => getDateTimeNow(),
                'updated_at' => getDateTimeNow(),
            ]);
    
            DB::commit();
            return response()->json([
                'status' => 200,
                'message' => "Customer Created",
                'code' => $customer_code . $max_id,
            ], 200);
    
        } catch (\Exception $e) {
            DB::rollBack();
            throw new Exception($e);
        }
    }
    

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {

        try {
            DB::beginTransaction();

            $customer = Customer::select('id', 'code')->where('code', $id)->first();
            $customer->update([
                'first_name' => $request->firstName,
                'last_name' => $request->lastName,
                'nic'=> $request->nic,
                'phone' => $request->phone,
                'address' => $request->address,
                'updated_at' => getDateTimeNow(),

            ]);
                DB::commit();
                return response()->json([
                    'status' => 200,
                    'message' => "Customer Updated",

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
    
            $customer = Customer::where('code', $id)->first();
    
            if (!$customer) {
                return response()->json([
                    'status' => 404,
                    'message' => 'Customer not found',
                ], 404);
            }

    
            $customer->delete();
    
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
