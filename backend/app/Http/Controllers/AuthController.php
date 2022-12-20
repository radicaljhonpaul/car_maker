<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserDetail;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //
    public function Login(Request $request) {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        
        $user = User::where('email', $request->email)->first();   
            
        if ($user == null || !$user || !Hash::check($request->password, $user->password)) {
            // Invalid
            return response(['message' => 'Invalid Credentials'], 401);
        }else{
            // Valid
            return response([
                'user' => $user,
                'token' => $user->createToken($request->email)->plainTextToken,
            ]);
        }
    }

    public function logout(Request $request) {
        $res = request()->user()->currentAccessToken()->delete();
        if($res == 1){
            return response(['message' => 'Logged Out Successfully']);
        }
    }
}
