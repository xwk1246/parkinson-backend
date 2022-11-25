<?php

namespace App\Http\Requests;

use App\Rules\RecordBelongsToMissionRule;
use App\Rules\RecordNotSubmittedRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UploadRecordRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user() && $this->user()->can('upload-record');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'category' => ['required', Rule::in([1, 2, 3, 4])],
            'location' => ['required', 'string'],
            'submit_time' => ['required', 'date'],
            'mission_id' => ['required', Rule::exists('missions', 'id'), new RecordNotSubmittedRule],
            'video' => ['required', 'array'],
        ];
    }
}
