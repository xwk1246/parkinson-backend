<?php

namespace App\Http\Requests;

use App\Models\Record;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
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
        $user = $this->user();
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
            'record_id' => ['required', Rule::exists('records', 'id'),function ($attribute, $value, $fail) {
                $user = Record::find($value)->user;
                if (!$user || !$user->isPatient()) {
                    return $fail('The user id must be a patient\'s id');
                }
                if ($user->doctor_id != Auth::id()) {
                    return $fail('This patient id doesn\'t belongs to this doctor');
                }
            }],
            'status' => ['required',Rule::in(['已檢閱', '待檢閱'])],
            'doctor_comment' => ['required',"max:255", 'string']
        ];
    }
}
