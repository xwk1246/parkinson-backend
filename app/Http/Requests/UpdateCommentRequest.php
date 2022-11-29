<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCommentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $user = Auth::user();
        return !!$user && $user->can('add-comment');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'record_id' => ['required', Rule::exists('records', 'id')],
            'status' => ['required',Rule::in(['已檢閱', '待檢閱'])],
            'doctor_comment' => ['required',"max:255", 'string']
        ];
    }
}
