<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class AssignMissionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $user = Auth::user();
        return !!$user && $user->can('assign-mission');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'user_id' => ['required', function ($attribute, $value, $fail) {
                $user = User::find($value);
                if (!$user || !$user->isPatient()) {
                    return $fail('The user id must be a patient\'s id');
                }
                if ($user->doctor_id != Auth::id()) {
                    return $fail('This patient id doesn\'t belongs to this doctor');
                }
            }],
            'due_date' => ['required', 'date', 'after:today'],
            'categories' => ['required', 'array'],
            'categories.*' => ['required', 'integer', Rule::in([1, 2, 3, 4]), 'distinct'],
        ];
    }
}
