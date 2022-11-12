<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],
            'password' => $this->passwordRules(),
            'phone' => ['required', 'max:255'],
            'gender' => ['required', 'max:255', Rule::in(['male', 'female', 'unknown'])],
            'birthday' => ['required', 'max:255', 'date', 'before:today'],
            'personal_id' => ['required', 'max:15', Rule::unique(User::class)],
            'doctor_id' => [Rule::exists('users', 'id'), 'nullable'],
        ])->validate();

        return User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'phone' => $input['phone'],
            'gender' => $input['gender'],
            'birthday' => $input['birthday'],
            'personal_id' => $input['personal_id'],
            'password' => Hash::make($input['password']),
            'doctor_id' => $input['doctor_id']
        ]);
    }
}
