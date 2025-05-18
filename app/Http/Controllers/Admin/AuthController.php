<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function loginUser(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'email' => 'required|string|email|exists:users,email',
            'password' => 'required|string'
        ]);

        if ($validation->fails()) {
            return response()->json([
                'status' => 400,
                'message' => $validation->errors()->first()
            ]);
        }

        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (Auth::attempt($credentials, false)) {
            if (Auth::user()->hasRole('admin')) {
                return response()->json([
                    'status' => 200,
                    'message' => 'Admin User',
                    /********** */  'url' => url('/admin/dashboard') 
                ]);
            }

            return response()->json([
                'status' => 200,
                'message' => 'Non Admin User',
              /****** */  'url' => url('/user/dashboard')
            ]);
        }

        return response()->json([
            'status' => 401,
            'message' => 'Invalid credentials'
        ]);
    }
}