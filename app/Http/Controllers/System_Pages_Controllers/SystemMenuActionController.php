<?php

namespace App\Http\Controllers\System_Pages_Controllers;

use App\Enums\TransactionCode;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\System_Models\SystemMenuAction;
use Illuminate\Support\Facades\DB;

class SystemMenuActionController extends Controller
{

    public function index()
    {
        try {
            $systemMenuAction = SystemMenuAction::select('code', 'system_page_group_code', 'system_page_code', 'insert', 'update', 'print')->get();
            return response()->json([
                'status' => 200,
                'systemMenuAction' => $systemMenuAction
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 500,
                'message' => $e
            ], 500);
        }
    }

    public function show($id)
    {
        try {
            $systemMenuAction = SystemMenuAction::select('code', 'system_page_group_code', 'system_page_code', 'insert', 'update', 'print')
                ->where('code', $id)
                ->get();
            return response()->json([
                'status' => 200,
                'systemMenuAction' => $systemMenuAction
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 500,
                'message' => $e
            ], 500);
        }
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        DB::transaction(function () {
        });
        $menu_code = TransactionCode::MENU_ACTION;
        $cus_code = SystemMenuAction::max('code');
        $max_id = $cus_code == null ? config('global.code_value') + 1 : substr("$cus_code", 3) + 1;

        DB::beginTransaction();
        try {
            $systemMenuAction = SystemMenuAction::create([
                'code' => $menu_code . $max_id,
                'system_page_group_code' => $request->system_page_group_code,
                'system_page_code' => $request->system_page_code,
                'insert' => $request->insert,
                'update' => $request->update,
                'print' => $request->print,
            ]);
            DB::commit();
            return response()->json([
                'status' => 200,
                'message' => "Action Created",

            ], 200);
        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json([
                'status' => 500,
                'message' => "Something went wrong "
            ], 500);
        }
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        DB::transaction(function () {
        });

        DB::beginTransaction();
        try {
            $systemMenuAction = SystemMenuAction::where('code',$id);
            $systemMenuAction->update([
                'system_page_group_code' => $request->system_page_group_code,
                'system_page_code' => $request->system_page_code,
                'insert' => $request->insert,
                'update' => $request->update,
                'print' => $request->print,
            ]);
            DB::commit();
            return response()->json([
                'status' => 200,
                'message' => "Action updated",

            ], 200);
        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json([
                'status' => 500,
                'message' => "Something went wrong "
            ], 500);
        }
    }

    public function destroy($id)
    {
        //
    }
}
