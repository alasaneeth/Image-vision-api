<?php

namespace App\Http\Controllers\System_Pages_Controllers;

use App\Http\Controllers\Controller;
use App\Models\System_Models\System;
use App\Models\System_Models\SystemPagesUser;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SystemPageController extends Controller
{
    public function index()
    {
        try {

            $systems  =
                System::with(['systemPageGroups' => function ($query) {
                    $query->where('effective_date_time', '<', Carbon::now())
                        ->where('expiry_date_time', '>', Carbon::now());
                }, 'systemPageGroups.systemPages' => function ($query) {
                    $query->where('effective_date_time', '<', Carbon::now())
                        ->where('expiry_date_time', '>', Carbon::now());
                }])
                ->get();
            return response()->json([
                'status' => 200,
                'systems' =>  $systems
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 500,
                'message' => $e
            ], 500);
        }
    }


    public function getPagesByUser($request)
    {
        try {

            $systems  =
                System::with(['systemPageGroups' => function ($query) {
                    $query->where('effective_date_time', '<', Carbon::now())
                        ->where('expiry_date_time', '>', Carbon::now());
                }, 'systemPageGroups.systemPages' => function ($query) {
                    $query->where('effective_date_time', '<', Carbon::now())
                        ->where('expiry_date_time', '>', Carbon::now());
                }])
                ->get();
            return response()->json([
                'status' => 200,
                'systems' =>  $systems
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 500,
                'message' => $e
            ], 500);
        }  
    }


}
