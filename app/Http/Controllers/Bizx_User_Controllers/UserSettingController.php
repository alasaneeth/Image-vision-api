<?php

namespace App\Http\Controllers\Bizx_User_Controllers;

use App\Http\Controllers\Controller;
use App\Models\Bizx_User\UserSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserSettingController extends Controller
{

    public function index()
    {

    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            $userSetting = UserSetting::where('code',$id)->first();

            $userSetting->update([
                'user_code'=>$request-> user_code,
                'receipt_type'=>$request-> receiptType,
                'table_rows_per_page'=>$request->  tableRowsPerPage,
                'lock_bill'=>$request-> lockBill,
                'table_dense_padding'=>$request-> tableDensePadding,
                'updated_at' => getDateTimeNow()

            ]);

            DB::commit();
            return response()->json(['status' => 200, 'message' => "Setting updated"]);
        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json([
                'status' => 500,
                'message' => $e
            ], 500);
        }
    }


    public function destroy($id)
    {
        //
    }
}
