<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validated = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],
            'password' => ['required', 'string'],
            'phone' => ['required', 'max:255'],
            'gender' => ['required', 'max:255', Rule::in(['male', 'female', 'unknown'])],
            'birthday' => ['required', 'max:255', 'date', 'before:today'],
            'personal_id' => ['required', 'max:15', Rule::unique(User::class)],
            'doctor_id' => [Rule::exists('users', 'id'), 'nullable'],
        ])->validate();

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'gender' => $validated['gender'],
            'birthday' => $validated['birthday'],
            'personal_id' => $validated['personal_id'],
            'password' => Hash::make($validated['password']),
            'doctor_id' => $validated['doctor_id']
        ]);
        $user->assignRole(is_null($user->doctor_id) ? 'doctor' : 'patient');
        return response()->json([
            'message' => 'Registered Successfully',
            'token' => $user->createToken("API TOKEN")->plainTextToken
        ], 200);
    }
    public function login(Request $request)
    {
        $validated = Validator::make($request->all(), [
            'personal_id' => ['required'],
            'password' => ['required', 'string'],
        ])->validate();

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
    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();
        return response()->json(['message' => 'logged out successfully'], 200);
    }
}
