<?php

namespace App\Http\Controllers\Bizx_User_Controllers;

use App\Http\Controllers\Controller;
use App\Models\System_Models\SystemPage;
use App\Models\System_Models\SystemPagesUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{

    public function logIn(Request $request)
    {
        try {

            $request->validate([
                'username' => 'required',
                'password' => 'required',
                //'device_name' => 'required',
            ]);

            $user = User::select('id', 'username', 'password')
                ->where('username', $request->username)->first();

            if (!$user || !Hash::check($request->password, $user->password)) {
                return response()->json([
                    'status' => 401,
                    'logged_in_error' => 'Check your username or password'
                ], 401);
            }

            $token = $user->createToken('autocare', ['shop'])->plainTextToken;
            $userRole = $user->role()->first();

            $userId = $user->id;

            $users = User::find($userId);
            // $SystemPagesUser = SystemPagesUser::where('user_id','=',$userId);
            $system_pages = $users->system_pages_users;

            $SystemPagesUser = 'SELECT * FROM system_pages_users
                                INNER JOIN users
                                ON system_pages_users.user_id = users.id
                                INNER JOIN system_pages
                                ON system_pages_users.system_page_code = system_pages.code
                                Where users.id =' . $userId;
            $results = DB::select($SystemPagesUser);

            $SystemPagesUser = SystemPagesUser::select('users.id', 'users.username', 'system_pages.code', 'system_pages.name', 'system_pages.route')
                ->join('users', 'system_pages_users.user_id', '=', 'users.id')
                ->join('system_pages', 'system_pages_users.system_page_code', '=', 'system_pages.code')
                ->where('users.id', '=', $userId)->get();

            return response()->json([
                'status' => 200,
                'role' => $userRole->name,
                'user' => [
                    'displayName' => $user->username,
                    'userId' => $userId,

                ],
                'accessToken' => $token,

                // 'System_pages_user' =>$SystemPagesUser,
                'system_pages_user' => $SystemPagesUser,
                'results' => $results

            ]);

        } catch (\Exception $error) {
            return response()->json([
                'status' => 500,
                'message' => "Back-end error",
                'errors' => $error
            ], 500);
        }
    }
    public function me(Request $request)
    {
        $header = $request->header('LocationCode');
        return $header;
    }

    public function logout()
    {
        try {

            $user = request()->user();
            $user->tokens()->where('id', $user->currentAccessToken()->id)->delete();

            return response()->json([
                'status' => 200,
                'message' => "Logged out",
            ]);

        } catch (\Exception $error) {
            return response()->json([
                'status' => 500,
                'message' => "Back-end error",
                'errors' => $error
            ], 500);
        }
    }

    public function signInWithUser()
    {
        try {
            if ($admin = Auth::user()) {

                $userRole = $admin->role()->first();

                return response()->json([
                    'status' => 200,
                    'message' => 'Authorized.',
                    'role' => $userRole->name,
                    'user' => [
                        'displayName' => $admin->username,
                    ],
                ]);
            }
        } catch (\Exception $error) {
            return response()->json([
                'status' => 500,
                'message' => "Back-end error",
                'errors' => $error
            ], 500);
        }
    }
}