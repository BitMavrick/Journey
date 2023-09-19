<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        return User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);
    }

    public function login(Request $request)
    {
        if (!Auth::attempt($request->only('email', 'password'))) {
            return response([
                'message' => 'Invalid credentials'
            ], 401);
        }

        // here auth attempt is successful
        $user = Auth::user();
        $token = $user->createToken('token')->plainTextToken;
        $cookie = cookie('jwt', $token, 60 * 24); // 1 day
        return response([
            'message' => 'success'
        ])->withCookie($cookie);
    }

    public function user()
    {
        return Auth::user();
    }

    public function logout()
    {
        $cookie = Cookie::forget('jwt');

        return response([
            'message' => 'Logged out successfully'
        ])->withCookie($cookie);
    }
}
