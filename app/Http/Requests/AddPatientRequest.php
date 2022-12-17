<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AddPatientRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $user = $this->user();
        return !!$user && $user->can('add-patient');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],
            'phone' => ['required', 'max:255'],
            'gender' => ['required', 'max:255', Rule::in(['male', 'female', 'unknown'])],
            'birthday' => ['required', 'max:255', 'date', 'before:today'],
            'personal_id' => ['required', 'max:15', Rule::unique(User::class)],
            'reset_pw' => ['required', 'boolean']
        ];
    }
}
