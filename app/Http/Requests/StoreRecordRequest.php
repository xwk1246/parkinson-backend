<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreRecordRequest extends FormRequest
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
            'user_id' => ['required', Rule::exists('users', 'id')],
            'mission_id' => ['required', Rule::exists('missions', 'id')],
            'date' => ['required', 'date'],
            'result' => ['required'],
            'status' => ['required', Rule::in(['已檢閱', '未處理', '待檢閱'])],
            'doctor_comment' => ['required', "max:255", 'string']
        ];
    }
}
