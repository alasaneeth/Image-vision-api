<?php

namespace App\Http\Controllers\Bizx_User_Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bizx_User\BizxUserType;
use App\Enums\TransactionCode;


class UserTypeController extends Controller
{
    public function index()
    {
        try{

            $userType  = BizxUserType::select('code','name')->get();
             return response()->json([
                 'status' => 200,
                 'userType' =>  $userType
             ]);


         }catch (\Exception $e) {
             return response()->json([
                 'status'=> 500,
                 'message'=> $e
             ],500);
         }
    }

    public function show($id)
    {
        try{
               $userType = BizxUserType::select('code','name')
               ->where( 'is_active', '=', 1)
               ->where('code', $id)->first();
               return response()->json([
                   'status' => 200,
                   'userType' =>  $userType
               ]);

           }catch (\Exception $e) {
               return response()->json([
                   'status'=> 500,
                   'message'=> $e
               ],500);
           }
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {

        try{

            $userType_code =TransactionCode::USER_TYPE_CODE;
            $cus_code = BizxUserType::max('code');

            $max_id= $cus_code==null ? config('global.code_value')+1 : substr("$cus_code",3)+1;
             $userType = BizxUserType::create([
            'code'=>$userType_code.$max_id,
            'name'=>$request->name,
            'created_by' => getUserCode(),
            'created_at' => getDateTimeNow(),
            'updated_by' => getUserCode(),
            'updated_at' => getDateTimeNow()

        ]);
        return response()->json([
            'status'=> 200,
            'message'=>' Type - Created'
            ]);


        } catch (\Exception $e) {


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


    public function update(Request $request, $id)
    {
        try{

            $userType= BizxUserType::findOrFail($id);
            $userType->update([
                'name'=>$request->name,
                'updated_by'=>getUserCode(),
                'updated_at'=>getDateTimeNow()
            ]);
            return response()->json(['status'=> 200, 'message'=> 'Type Updated']);

        } catch (\Exception $e) {


            return response()->json([
                'status'=> 500,
                'message'=> $e
            ],500);
        }

    }


    public function destroy($id)
    {
        try{
            $type = BizxUserType::select('id','is_active')->findOrFail($id);
            $type->update([
                'is_active'=>0
            ]);
            return response()->json([
                'status'=> 204,
                'message'=>"Type - Deleted"
                ]);


            }catch (\Exception $e) {
                return response()->json([
                    'status'=> 500,
                    'message'=> $e
                ],500);
            }

    }
}
