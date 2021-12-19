<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Intervention\Image\ImageManagerStatic as Image;

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

    public function getImage($photo)
    {
        if ($photo == null) {
            return response()->json([
                "message" => "Gambar tidak ditemukan",
                "status" => "failed",
                "status_code" => 404
            ], 404);
        }

        return Image::make(public_path("images/users/") . $photo)->response();
    }

    public function getImageName($img, $users): string
    {
        $folderPath = public_path('images/users/');
        if (!File::isDirectory($folderPath)) {
            File::makeDirectory($folderPath, 0777, true, true);
        }

        $image_parts = explode(";base64,", $img);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);
        $file = $folderPath . $users->id . "." . $image_type;

        file_put_contents($file, $image_base64);

        return $users->id . '.' . $image_type;
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
            $users = User::find($user->id);

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

            if ($request->image) {
                $data['image'] = $this->getImageName($request->image, $users);
            }

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
