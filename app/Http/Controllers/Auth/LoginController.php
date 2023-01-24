<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    //

    public function store(Request $request)
    {
        # code...
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required'
        ]);

        $data = $request->all();

        $user = User::where('email', $data['email'])->first();

        if(!Hash::check($data['password'], $user['password'])){
            $response['status'] = false;
            $response['message'] = "Wrong Credentials Entered";
            return response()->json($response, 401);
        }

        $token = $user->createToken('myapptoken')->plainTextToken;

        $response = [
            'status' => true,
            'user' => $user,
            'token' => $token
        ];

        return response()->json($response, 200);

    }
}
