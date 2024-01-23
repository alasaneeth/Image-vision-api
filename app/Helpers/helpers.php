<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


if (!function_exists('getUserCode')) {
    function getUserCode()
    {
        return Auth::id();
    }
}

if (!function_exists('getCurrentLocationCode')) {
    function getCurrentLocationCode(Request $request)
    {
        return $request->header('LocationCode');
    }
}



if (!function_exists('getDateTimeNow')) {
    function getDateTimeNow()
    {
        return  date('Y-m-d H:i:s');
    }
}
