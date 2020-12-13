<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'email|required',
            'password' => 'min:6|required',
        ]);

        $token = Str::random(60);
        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'api_token' => $token,
        ]);

        return response()->json(['token' => $token], 200);


    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'email|required',
            'password' => 'min:6|required',
        ]);

        $user = User::where('email', $request->email)->first();
        if($user) {
            if(Hash::check($request->password, $user->password)) {
                $token = $user->api_token;
                return response()->json(['access_token' => $token], 200);
            }
            return response()->json(['meesage' => 'Wrong Password!'], 422);
        }
        return response()->json(['message' => 'User does not exist!'], 422);
    }
}
