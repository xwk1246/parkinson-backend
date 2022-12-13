<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\ResetPasswordRequest;
use App\Http\Requests\UpdatePasswordRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    /**
     * Register a user.
     * 
     * @param \App\Http\Requests\RegisterRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(RegisterRequest $request)
    {
        $validated = $request->validated();

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'gender' => $validated['gender'],
            'birthday' => $validated['birthday'],
            'personal_id' => $validated['personal_id'],
            'password' => Hash::make($validated['password']),
            'doctor_id' => $validated['doctor_id'],
            'reset_pw' => true
        ]);
        $user->assignRole(is_null($user->doctor_id) ? 'doctor' : 'patient');

        return response()->json([
            'message' => 'Registered Successfully',
            'token' => $user->createToken("API TOKEN")->plainTextToken
        ], 200);
    }

    /**
     * Login a user.
     * 
     * @param \App\Http\Requests\LoginRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(LoginRequest $request)
    {
        $validated = $request->validated();

        if (!Auth::attempt($validated)) {
            return response()->json(['message' => 'credentials mismatch'], 401);
        }
        $user = User::where('personal_id', $validated['personal_id'])->first();
        return response()->json(
            [
                'message' => 'logged in successfully',
                'token' => $user->createToken("API TOKEN")->plainTextToken,
                'user' => $user->load('roles')
            ],
            200
        );
    }

    /**
     * Logout a user.
     * 
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();
        return response()->json(['message' => 'logged out successfully'], 200);
    }

    public function reset(ResetPasswordRequest $request, User $user)
    {
        $newPassword = Str::random(8);
        $user->update(['password' => Hash::make($newPassword), 'reset_pw' => true]);
        return response()->json(['password' => $newPassword], 200);
    }
    public function updatePassword(UpdatePasswordRequest $request)
    {
        $validated = $request->validated();
        $loginUser = $request->user();
        /*if (Hash::check($validated['password'], $loginUser->password)) {
            return response()->json(['message' => '密碼不可與上次重複'], 422);
        }else if(strtolower($validated['password']) == $loginUser['personal_id']) {
            return response()->json(['message' => '密碼不可與帳號相同'], 422);
        }*/
            $loginUser->update(['password' => Hash::make($validated['password'])]);
            return response()->json(['message' => 'Change password successfully'], 200);
        
        
    }
}
