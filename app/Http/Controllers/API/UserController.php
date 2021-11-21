<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    public function login(Request $request) {
        try {
            $request->validate([
                'email' => ['required', 'email'],
                'password' => ['required']
            ]);

            $credentials = request(['email', 'password']);

            if (!Auth::attempt($credentials)) {
                return ResponseFormatter::error([
                    'message' => 'Unauthorized'
                ], 'Authentication failed', 400);
            }

            $user = User::where('email', $request->email)->first();

            if (!Hash::check($request->password, $user->password, [])) {
                throw new \Exception('Invalid Credentials');
            }

            $tokenResults = $user->createToken('authToken')->plainTextToken;

            return ResponseFormatter::success([
                'access_token' => $tokenResults,
                'token_type' => 'Bearer',
                'user' => $user
            ], 'Authentication success');
        } catch (ValidationException $e) {
            return ResponseFormatter::error([
                'message' => 'Something went wrong',
                'errors' => $e->errors()
            ], 'Authentication failed', 400);
        }
    }

    public function register(Request $request) {
        try {
            $request->validate([
                'name' => ['required'],
                'email' => ['required', 'email', 'unique:users,email'],
                'phone_number' => ['required', 'unique:users,phone_number'],
                'password' => ['required', 'confirmed']
            ]);

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone_number' => $request->phone_number,
                'password' => Hash::make($request->password),
            ]);

            $tokenResults = $user->createToken('authToken')->plainTextToken;

            return ResponseFormatter::success([
                'access_token' => $tokenResults,
                'token_type' => 'Bearer',
                'user' => $user
            ], 'Registration success');
        } catch (ValidationException $e) {
            return ResponseFormatter::error([
                'message' => 'Something went wrong',
                'errors' => $e->errors()
            ], 'Registration failed', 400);
        }
    }

    public function updateProfile(Request $request) {
        try {
            $user = Auth::user();
            $request->validate([
                'name' => ['sometimes'],
                'email' => ['sometimes', 'email', 'unique:users,email,except,' . $user->id],
                'phone_number' => ['sometimes'],
                'password' => ['sometimes']
            ]);

            $data = [];

            if ($request->name) {
                $data['name'] = $request->name;
            }

            if ($request->email) {
                $data['email'] = $request->email;
            }

            if ($request->phone_number) {
                $data['phone_number'] = $request->phone_number;
            }

            if ($request->password) {
                $data['password'] = Hash::make($request->password);
            }

            $users = User::find($user->id);
            $users->update($data);

            return ResponseFormatter::success([
                'user' => $users
            ], 'Update profile success');
        } catch (ValidationException $e) {
            return ResponseFormatter::error([
                'message' => 'Something went wrong',
                'errors' => $e->errors()
            ], 'Update profile failed', 400);
        }
    }

    public function fetch() {
        try {
            $user = Auth::user();

            return ResponseFormatter::success([
                'user' => $user
            ], 'Fetch user success');
        } catch (Exception $e) {
            return ResponseFormatter::error([
                'message' => 'Something went wrong',
                'errors' => $e->getMessage()
            ], 'Fetch user failed', 400);
        }
    }
}
