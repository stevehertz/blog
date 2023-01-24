<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('guest');   
    }

    public function store(Request $request)
    {
        # code...
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|max:30|string|confirmed'
        ]);

        $data = $request->all();

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);

        $token = $user->createToken('myapptoken')->plainTextToken;

        $response = [
            'status' => true,
            'user' => $user,
            'token' => $token
        ];

        return response()->json($response, 200);
    }
}
