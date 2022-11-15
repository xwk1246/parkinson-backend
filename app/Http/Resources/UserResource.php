<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public static $wrap = 'user';

    public function toArray($request)
    {
        
        return [
            'user_id' => $this->id,
            'name' => $this->name,
            'personal_id' => $this->personal_id,
            'gender' => $this -> gender,
            'mission' => MissionResource::collection($this->missions),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ] ;
    }
}
