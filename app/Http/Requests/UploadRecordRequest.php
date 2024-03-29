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
            'category' => ['required', Rule::in(['手指捏握', '手部抓握', '手掌翻面', '抬腳'])],
            'location' => ['required', 'string'],
            'record_time' => ['required', 'date'],
            'mission_id' => ['required', Rule::exists('missions', 'id'), new RecordNotSubmittedRule],
            'video' => ['required', 'array'],
        ];
    }
}
