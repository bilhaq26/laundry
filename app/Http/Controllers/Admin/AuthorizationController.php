<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class AuthorizationController extends Controller
{
   public function login(Request $request)
   {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $user = User::where('username', $request->username)->first();
        if(!$user || !Hash::check($request->password, $user->password)){
            return response()->json([
                'success' => false,
                'message' => 'Username atau Password Salah'
            ], 401);
        }else{
            $token = $user->createToken('token')->plainTextToken;
            return response()->json([
                'success' => true,
                'message' => 'Login Berhasil',
                'data' => $user,
                'token' => $token
            ], 200);
        }
   }

    public function logout(Request $request)
    {
          $request->user()->currentAccessToken()->delete();
          return response()->json([
                'success' => true,
                'message' => 'Logout Berhasil'
          ], 200);
    }
}
