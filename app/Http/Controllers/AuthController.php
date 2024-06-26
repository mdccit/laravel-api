<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        try {
            $request->validate([
                'email' => 'required|email',
                'password' => 'required',
            ]);

            $user = User::where('email', $request->email)->first();

            if (!$user || !Hash::check($request->password, $user->password)) {
                return response(['message' => 'Invalid credentials'], 401);
            }

            $token = $user->createToken('my-app-token')->plainTextToken;

            return response(['user' => $user, 'token' => $token]);
        }catch(ValidationException $e) {
            return response()->json(['errors' => $e->errors()], 422);
        }

    }

    // retrieve a csrf token for the session
    public function getCsrfToken()
    {
        return response()->json([
            'csrfToken' => Session::token()
        ]);
    }
}
