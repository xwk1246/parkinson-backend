<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RecordResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'submit_date' => $this->submit_date,
            'result' => $this->result,
            'status' => $this->status,
            'category' => $this->category,
            'doctor_comment' => $this->doctor_comment,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
