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
            'record_time' => ['required', 'datetime'],
            'location' => ['required'],
            'result' => ['required'],
            'status' => ['required', Rule::in(['未上傳', '已檢閱', '未處理', '待檢閱'])],
            'category' => ['required', Rule::in(['手指捏握', '手部抓握', '手掌翻面', '抬腳']), Rule::unique('records', 'category')->where(fn ($query) => $query->where('mission_id', $this->input('mission_id')))],
            'doctor_comment' => ['required', "max:255", 'string']
        ];
    }
}
