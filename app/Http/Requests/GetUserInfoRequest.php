<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Models\User;
use Laravel\Fortify\Rules\Password;

class GetUserInfoRequest extends FormRequest{
   /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(){
        $id = ($this->route('user')->id);
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class)->ignore($id),
            ],
            'phone' => ['required', 'max:255'],
            'gender' => ['required', 'max:255', Rule::in(['male', 'female', 'unknown'])],
            'birthday' => ['required', 'max:255', 'date', 'before:today'],
            'personal_id' => [
                'required', 'max:15',
                Rule::unique(User::class)->ignore($id),
            ],
            'doctor_id' => [Rule::exists('users', 'id'), 'nullable'],
        ];
 
    }
}
