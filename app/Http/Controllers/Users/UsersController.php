<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    //

    public function index(Request $request)
    {
        # code...
    }


    public function logout(Request $request)
    {
        # code...
        auth()->user()->tokens()->delete();

        $response = [
            'status' => true,
            'message' => 'Logged out successfully',
        ];

        return response()->json($response);
    }
}
