<?php

namespace App\Http\Controllers\Parcel_Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Enums\TransactionCode;
use App\Enums\MultiPurposeStatus;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Parcel_Models\Parcel;
use App\Models\Parcel_Models\ParcelImage;

class ParcelController extends Controller
{

   
    public function index(Request $request)
    {
    try {
        $parcels = Parcel::select(
            'code',
            'customer_code',
            'weight',
            'from_location_code',
            'to_location_code',
            'route_code',
            'pickup_date',
            'status',
            'created_at',
            'updated_at',
        ) 
        ->with('parcelImages')
        ->with('customer') 
        ->with('route')
        ->with('route.courier')
        ->with('fromLocation')
        ->with('toLocation')
        ->where('status', '<>', MultiPurposeStatus::DELIVERY)
        ->where('from_location_code', '=', getCurrentLocationCode($request))
        ->get();

        return response()->json([
            'status' => 200,
            'parcels' => $parcels
        ]);
    } catch (\Exception $e) {
        throw new Exception($e);
    }
}

public function show($id)
{
    try {
        $parcel = Parcel::select(
            'code',
            'customer_code',
            'weight',
            'from_location_code',
            'to_location_code',
            'route_code',
            'pickup_date',
            'created_at',
            'updated_at'
        ) 
        ->with('parcelImages')
        ->with('customer') 
        ->with('route')
        ->with('route.courier')
        ->with('fromLocation')
        ->with('toLocation')
        ->where('code', $id)
        ->first();

        return response()->json([
            'status' => 200,
            'parcel' => $parcel
        ]);
    } catch (\Exception $e) {
        throw new Exception($e);
    }
}

public function parcelSearch($key)
{
    try {

        $parcels = Parcel::select(
            'code',
            'customer_code',
            'weight',
            'from_location_code',
            'to_location_code',
            'route_code',
            'pickup_date',
            'created_at',
            'updated_at'
        ) 
        ->with('parcelImages')
        ->with('customer') 
        ->with('route')
        ->with('route.courier')
        ->with('fromLocation')
        ->with('toLocation')
        ->where(function ($query) use ($key) {
            $query->Where('code', 'like', "%$key%");     
        })
        ->get();

        return response()->json([
            'status' => 200,
            'parcels' => $parcels
        ]);
    } catch (\Exception $e) {
        throw new Exception($e);
    }
}


public function store(Request $request)
    {
        DB::beginTransaction();
    
        try {
            $parcel_code = TransactionCode::PARCEL_CODE;
            $par_code = Parcel::max('code');
            $max_id = $par_code == null ? config('global.code_value') + 1 : substr("$par_code", 3) + 1;
    
            $parcel = Parcel::create([
                'code' => $parcel_code . $max_id,
                'customer_code' => $request->customer,
                'weight' => $request->weight,
                'from_location_code' => $request->fromLocation,
                'to_location_code' => $request->toLocation,
                'route_code'=>$request->route,
                'pickup_date' => getDateTimeNow(),
                'delevery_date' => $request->deleveryDate ?? null,
                'created_at' => getDateTimeNow(),
                'updated_at' => getDateTimeNow(),
            ]);

            $parcel_img_code = TransactionCode::PARCEL_IMAGE_CODE;
            $par_img_code = ParcelImage::max('code');
            $max_id_image  = $par_img_code == null ? config('global.code_value') + 1 : substr("$par_img_code", 3) + 1;

            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
    

            ParcelImage::create([
                'code' => $parcel_img_code . $max_id_image ,
                'parcel_code' =>   $parcel->code,
                'path' => '/images/' . $imageName,
                'created_at' => getDateTimeNow(),
                'updated_at' => getDateTimeNow(),
            ]);
    
            DB::commit();
            return response()->json([
                'status' => 200,
                'message' => "Parcel Created Successfully Created",
                'code' => $parcel_code . $max_id,
            ], 200);
    
        } catch (Exception $e) {
            DB::rollBack();
            throw new Exception($e);
        }
    } 

    public function fetchParcelDetails($routeCode)
{
    
    try {
      
        $parcels = Parcel::select(
            'code',
            'customer_code',
            'weight',
            'from_location_code',
            'to_location_code',
            'route_code',
            'pickup_date',
            'created_at',
            'updated_at'
        ) 
        ->with('parcelImages')
        ->with('customer') 
        ->with('route')
        ->with('route.courier')
        ->with('fromLocation')
        ->with('toLocation')
        ->where('route_code',  $routeCode)
        ->get();

        return response()->json([
            'status' => 200,
            'parcels' => $parcels
        ]);
    } catch (\Exception $e) {
        throw new Exception($e);
    }
}

public function receivedParcel(Request $request)
{
try {
    $parcels = Parcel::select(
        'code',
        'customer_code',
        'weight',
        'from_location_code',
        'to_location_code',
        'route_code',
        'pickup_date',
        'status',
        'created_at',
        'updated_at',
    ) 
    ->with('parcelImages')
    ->with('customer') 
    ->with('route')
    ->with('route.courier')
    ->with('fromLocation')
    ->with('toLocation')
    //->where('status', '<>', MultiPurposeStatus::DELIVERY)
    ->where('to_location_code', '=', getCurrentLocationCode($request))
    ->where('status', '=', MultiPurposeStatus::DELIVERY)

    ->get();

    return response()->json([
        'status' => 200,
        'parcels' => $parcels
    ]);
} catch (\Exception $e) {
    throw new Exception($e);
}
}



public function update(Request $request, $status)
{
    try {
        $parcels = $request->selected;

        foreach ($parcels as $parcel) {
            $delevery = Parcel::select(
                'code'
            )
                ->where('code', $parcel)
                ->first();
                Parcel::where('code', $parcel)
                ->first()
                ->update([
                    'status' => $status,
                    'updated_at' => getDateTimeNow()
                ]);

        }


        return response()->json([
            'status' => 200,
            'message' => "updated"
        ]);

    } catch (\Exception $e) {
        throw new Exception($e);
    }
}

}
