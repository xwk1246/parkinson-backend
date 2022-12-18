<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Hash;


class UpdatePasswordRequest extends FormRequest
{
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
    public function rules()
    {
        return [
            'old_password' => ['required', function ($attribute, $value, $fail) {
                if (Hash::check($value, $this->user()->password) === false) {
                    $fail('輸入了錯誤的舊密碼');
                }
              }
            ],
            'new_password' => [
                'required', Password::min(8)->letters(), function ($attribute, $value, $fail) {
                    if ($value === $this->user()->personal_id) {
                        $fail('密碼不可與帳號相同');
                    }
                },function ($attribute, $value, $fail) {
                    if (Hash::check($value, $this->user()->password)) {
                        $fail('密碼不可與上次設定相同');
                    }
                },
            ]
        ];
    }
}
