<?php

namespace App\Http\Controllers\Bizx_User_Controllers;

use App\Enums\TransactionCode;
use App\Http\Controllers\Controller;
use App\Models\Bizx_User\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Arr;
use function PHPUnit\Framework\isEmpty;

class SettingController extends Controller
{

    public function index()
    {
        //
    }

    public function show($id)
    {
        try {

            $setting = Setting::select('code', 'logo_path', 'shop_name', 'phone_number_1', 'phone_number_2', 'tel_number_1', 'tel_number_2', 'email', 'website', 'receipt_note', 'thank_note')
                ->where('code', $id)->first();

            return response()->json(['status' => 200, 'setting' => $setting]);
        } catch (\Exception $e) {


            return response()->json([
                'status' => 500,
                'message' => $e
            ], 500);
        }
    }


    public function create()
    {
    }


    public function store(Request $request)
    {
        try {

            DB::beginTransaction();
            $user_code = TransactionCode::SETTING;
            $sett_code = Setting::max('code');
            $max_id = $sett_code == null ? config('global.code_value') + 1 : substr("$sett_code", 3) + 1;
            $setting = Setting::create([
                'code' => $user_code . $max_id,
                'logo_path' => $request->file('file')->store('images'),
                'shop_name' => $request->shopName,
                'phone_number_1' => $request->phoneNumber1,
                'phone_number_2' => $request->phoneNumber2,
                'tel_number_1' => $request->telNumber1,
                'tel_number_2' => $request->telNumber2,
                'email' => $request->email,
                'website' => $request->website,
                'receipt_note' => $request->receipt_note,
                'thank_note' => $request->thank_note,
                'created_by' => getUserCode(),
                'created_at' => getDateTimeNow(),
                'updated_by' => getUserCode(),
                'updated_at' => getDateTimeNow()
            ]);

            DB::commit();
            return response()->json(['status' => 200, 'message' => "Setting created"]);
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
            $setting = Setting::where('code', $id)->first();
            $setting->update([
                'logo_path' => $request->file('file')->store('images'),
                'shop_name' => $request->shopName,
                'phone_number_1' => $request->phoneNumber1,
                'phone_number_2' => $request->phoneNumber2,
                'tel_number_1' => $request->telNumber1,
                'tel_number_2' => $request->telNumber2,
                'email' => $request->email,
                'website' => $request->website,
                'receipt_note' => $request->receipt_note,
                'thank_note' => $request->thank_note,
                'updated_by' => getUserCode(),
                'updated_at' => getDateTimeNow()
            ]);

            DB::commit();
            return response()->json(['status' => 200, 'message' => "Setting update"]);
        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json([
                'status' => 500,
                'message' => $e
            ], 500);
        }
    }

    public function updateImage(Request $request)
    {
        try {
            // sample
            $image = $request->images[0];

            if ($imageName = $this->singleImageUpload($image, 'logos')) {
                $setting = Setting::select('id', 'code', 'logo_path')->where('code', 1)->first();
                $setting->update([
                    'logo_path' => $imageName
                ]);

                return response()->json([
                    'status' => 'updated'
                ]);
            }

            return response()->json([
                'message' => 'Could not get an image from react'
            ], 419);
        } catch (\Exception $e) {

            return response()->json([
                'status' => 500,
                'message' => $e
            ], 500);
        }
    }

    private function multyImageUpload($images, $folder_name, $model)
    {
        if (count($images) > 0) {
            foreach ($images as $image) {
                $img = $image['url'];  // your base64 encoded
                $extension = explode('/', $image['type']);
                $img = str_replace('data:' . $image['type'] . ';base64,', '', $img);
                $img = str_replace(' ', '+', $img);
                $imageName = Str::random(10) . '.' . $extension[1];
                File::put(storage_path() . '/app/public/.' . $folder_name . '}/' . $imageName, base64_decode($img));

                $model::create([
                    'code' => $image['code'],
                    'logo_path' => $imageName,
                ]);

                return response()->json([
                    'status' => 200,
                    'Message' =>  'Success'
                ]);
            }
        }
    }

    private function singleImageUpload($image, $folder_name)
    {

        if (!is_null($image)) {
            $img = $image['url'];  // your base64 encoded
            $extension = explode('/', $image['type']);
            $img = str_replace('data:' . $image['type'] . ';base64,', '', $img);
            $img = str_replace(' ', '+', $img);
            $imageName = 'logo-' . date('dmYHis') . '.' . $extension[1];
            File::put(storage_path() . '/app/public/' . $folder_name . '/' . $imageName, base64_decode($img));
            return $imageName;
        }

        return null;
    }

    public function destroy($id)
    {
    }
}
