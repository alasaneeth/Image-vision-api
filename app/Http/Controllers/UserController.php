<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash; // Import Hash facade

class UserController extends Controller
{
  
    public function index()
    {
        $users = User::with('role')->get();


          return response()->json([
                'status' => 200,
                'user' => $users
            ]);
    }
    
    public function show($id)
    {
        $users = User::with('role')
        ->where('id', $id)
        ->first();

          return response()->json([
                'status' => 200,
                'user' => $users
            ]);
    }
   
   
    // public function show($id)
    // {
    //     try {

    //         $users = Customer::select(
    //             'code',
    //             'first_name',
    //             'last_name',
    //             'nic',
    //             'phone',
    //             'address',

    //         )
    //             ->where('id', $id)
    //             ->first();
    //         return response()->json([
    //             'status' => 200,
    //             'customer' =>   $users,
    //             //'customerAddress'=>$customerAddress

    //         ]);
    //     } catch (\Exception $e) {
    //         throw new Exception($e);
    //     }
    // }
    
    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        DB::beginTransaction();

        try {
            $user = User::create([
                'name' => $request->name,
                'address' => $request->address,
                'email' => $request->email,
                'contact' => $request->contactNo,
                'nic' => $request->nicNumber,
                'remarks' => $request->remarks,
                'username' => $request->username,
                'password' => Hash::make($request->password), 
                'created_at' => now(), 
                'updated_at' => now(),
            ]);

            $userrole = UserRole::create([
                'name'=>  $request->userType['name'],
                'user_id' => $user->id,
            ]);

            DB::commit();

            return response()->json([
                'status' => 200,
                'message' => 'User Created',
            ], 200);

        } catch (\Exception $e) {
            DB::rollBack();
            throw new Exception($e);
        }
    }
}
