<?php

namespace App\Http\Controllers;

use App\Http\Middleware\Authenticate;
use App\Http\Requests\StoreuserRequest;
use App\Models\cart;
use App\Models\user;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    public function register(StoreuserRequest $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|string|max:255',
            'password' => 'required|string|min:6',
            'address' => 'required|string|max:255',
            'phoneNumber' => 'required|string|max:20', // Tùy chỉnh độ dài tối đa của số điện thoại
            'email' => 'required|string|email|max:255|unique:users', // Đảm bảo email là duy nhất trong bảng users
            'role' => 'required|string|max:10',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $user = user::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'address' => $request->address,
            'phoneNumber' => $request->phoneNumber,
            'role' => $request->role,
        ]);

        $token = JWTAuth::fromuser($user);
        $customer_id = user::latest()->value('id');
        cart::create(['customer_id' => $customer_id]);

        return response()->json(compact('user', 'token'), 201);
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (!$token = JWTAuth::attempt($credentials)) {
            return response()->json(['error' => 'Invalid Credentials'], 401);
        }
        $user = Auth::user();
        return response()->json(compact('user','token'));
    }

    public function getUser(Request $request)
    {
//        $user = Auth::user();
//        return response()->json($user);
//        $user = JWTAuth::toUser($token);
//        return response()->json($user);

        $user = user::where('email', $request->email)->get();
        return response()->json($user);
    }
}
