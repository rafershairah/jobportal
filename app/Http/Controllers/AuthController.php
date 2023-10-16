<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    
    {
        $fields = $request->validate([
            "username" => "required|string|unique:users,username",
            "first_name" => "required|string",
            "middle_name" => "nullable|string",
            "last_name" => "required|string",
            "email" => "required|string|unique:users,email|email",
            "password" => "required|string|confirmed"
        ]);

        $user = User::create([
            "username" => $fields["username"],
            "first_name" => $fields["first_name"],
            "last_name" => $fields["last_name"],
            "middle_name" => $fields["middle_name"],
            "email" => $fields["email"],
            "password" => Hash::make($fields["password"]) // Use Hash::make to hash the password
        ]);

        $token = $user->createToken("test")->plainTextToken;

        return response([
            "user" => $user,
            "token" => $token,
        ], 201);
    }

    public function logout() {
        return "Logged out";

        auth()->user()->tokens()->delete();

        return response([
            "message" => "Logged Out",
        ], 200);
    
    }

}