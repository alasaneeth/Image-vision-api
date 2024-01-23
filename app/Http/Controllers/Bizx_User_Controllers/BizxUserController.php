<?php

namespace App\Http\Controllers\Bizx_User_Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Bizx_User\BizxUser;
use App\Enums\TransactionCode;
use App\Models\Bizx_User\UserSetting;
use Illuminate\Support\Facades\DB;

class BizxUserController extends Controller
{

    public function index()
    {
        $user = BizxUser::select('bizx_users.code', 'user_type_code', 'username', 'password', 'first_name', 'second_name', 'bizx_user_types.name AS userType')
            ->join('bizx_user_types', 'bizx_user_types.code', '=', 'bizx_users.user_type_code')
            ->where('bizx_users.is_active', '=', 1)->get();

        return response()->json([
            'status' => 200,
            'user' => $user
        ]);
    }

    public function show($id)
    {
        $user = BizxUser::select('code', 'user_type_code', 'username', 'password', 'first_name', 'second_name', 'phone_1', 'passport_number', 'nic_number', 'email', 'is_active', 'is_verified', 'notes')
            ->with([
                'bizxUserType' => function ($query) {
                    $query->select('code', 'name')->where('is_active', '=', 1);
                }
            ])
            ->where('is_active', '=', 1)
            ->where('code', $id)
            ->first();

        return response()->json([
            'status' => 200,
            'user' => $user
        ]);
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {

        try {
            DB::beginTransaction();
            $user_code = TransactionCode::USER_CODE;
            $cus_code = BizxUser::max('code');
            $max_id = $cus_code == null ? config('global.code_value') + 1 : substr("$cus_code", 3) + 1;


            $user = BizxUser::create([

                'code' => $user_code . $max_id,
                'user_type_code' => $request->userTypeCode,
                'username' => $request->username,
                'password' => $request->password,
                'first_name' => $request->firstName,
                'second_name' => $request->secondName,
                'phone_1' => $request->phone1,
                'passport_number' => $request->passportNumber,
                'nic_number' => $request->nicNumber,
                'email' => $request->email,
                'is_active' => $request->isActive,
                'is_verified' => $request->isVerified,
                //'email_verified_at'=>$request->email_verified_at,
                'notes' => $request->notes,
                'created_at' => getDateTimeNow(),


            ]);
            if ($user) {
                $userSetting = $request->userSetting;
                $user_code = TransactionCode::USER_SETTING;
                $sett_code = UserSetting::max('code');
                $max_id = $sett_code == null ? config('global.code_value') + 1 : substr("$sett_code", 3) + 1;

                $setting = UserSetting::create([

                    'code' => $user_code . $max_id,
                    'user_code' => $user->code,
                    'receipt_type' => $userSetting['receiptType'],
                    'table_rows_per_page' => $userSetting['tableRowsPerPage'],
                    'lock_bill' => $userSetting['lockBill'],
                    'table_dense_padding' => $userSetting['tableDensePadding'],
                    'created_at' => getDateTimeNow()

                ]);


            }
            DB::commit();
            return response()->json(['status' => 200, 'message' => "User created"]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'status' => 500,
                'message' => $e
            ], 500);
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
            $user = BizxUser::where('code', $id)->first();
            $user->update([
                'user_type_code' => $request->userTypeCode,
                'username' => $request->username,
                'password' => $request->password,
                'first_name' => $request->firstName,
                'second_name' => $request->secondName,
                'phone_1' => $request->phone1,
                'passport_number' => $request->passportNumber,
                'nic_number' => $request->nicNumber,
                'email' => $request->email,
                'is_active' => $request->isActive,
                'is_verified' => $request->isVerified,
                //'email_verified_at'=>$request->email_verified_at,
                'notes' => $request->notes,
                'updated_at' => getDateTimeNow()
            ]);
            DB::commit();
            return response()->json(['status' => 200, 'message' => "User updated"]);
        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json([
                'status' => 500,
                'message' => $e
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $user = BizxUser::select('id', 'is_active')->findOrFail($id);
            $user->update([
                'is_active' => 0
            ]);
            return response()->json([
                'status' => 204,
                'message' => "User - Deleted"
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 500,
                'message' => $e
            ], 500);
        }
    }

    /**
     * Summary of userSearch
     * @param mixed $key
     * @throws \App\Http\Controllers\Bizx_User_Controllers\Exception
     * @return string
     */
    public function userSearch($key)
    {
        try {
            $user = User::select('id', 'username')
                ->where('username', 'like', "%$key%")
                ->get();
            return response()->json([
                'status' => 200,
                'user' => $user
            ]);
        } catch (\Exception $e) {
            throw new Exception($e);
        }
    }



}