<?php

namespace App\Rules;

use App\Models\Record;
use Illuminate\Contracts\Validation\DataAwareRule;
use Illuminate\Contracts\Validation\Rule;

class RecordNotSubmittedRule implements Rule, DataAwareRule
{
    protected $data = [];
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    public function setData($data)
    {
        $this->data = $data;
        return $this;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        // check correspond mission exist and video not submit
        $recordExists = Record::where('mission_id', $this->data['mission_id'])->where('category', $this->data['category'])->whereNull('record_time')->exists();
        if ($recordExists) return true;
        return false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'record not found or already submitted';
    }
}
