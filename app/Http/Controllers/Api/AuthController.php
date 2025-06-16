<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Member; // Use Member model instead of User
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class AuthController extends Controller
{
    // Member registration
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:members',
            'password' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson(), 400);
        }

        $member = Member::create([
            'name' => $request->get('name'),
            'username' => $request->get('username'),
            'password' => $request->get('password'),
            'phone' => $request->get('phone'),
            'address' => $request->get('address'),
            'designation' => 'Member',
            'status' => 1,
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
        ]);

        $token = JWTAuth::fromUser($member);
        $member = auth('member_api')->user();

        return response()->json([
            'member' => $member,
            'token' => $token,
        ]);
    }

    // Member login
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (! $token = auth('member_api')->attempt($credentials)) {
            return response()->json(['error' => 'Invalid credentials'], 401);
        }

        $member = auth('member_api')->user();

        if ($member->status !== 0) {
            auth('member_api')->logout();
            return response()->json(['error' => 'Account is inactive'], 401);
        }

        return response()->json([
            'member' => $member,
            'token' => $token,
        ]);
    }

    // Get authenticated member
    public function getUser()
    {
        try {
            // Use the member guard to authenticate the token
            if (! $member = auth('member_api')->user()) {
                return response()->json(['error' => 'Member not found'], 404);
            }
            $member->image = asset('storage/member/' . $member->image);
        } catch (\Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {
            return response()->json(['error' => 'Token has expired'], 401);
        } catch (\Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {
            return response()->json(['error' => 'Token is invalid'], 400);
        } catch (\Tymon\JWTAuth\Exceptions\JWTException $e) {
            return response()->json(['error' => 'Token is absent'], 400);
        }

        return response()->json(compact('member'));
    }

    // Member logout
    public function logout()
    {
        JWTAuth::invalidate(JWTAuth::getToken());

        return response()->json(['message' => 'Successfully logged out']);
    }
}
