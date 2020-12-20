<?php

namespace App\Http\Resources\Roles;

use App\Http\Resources\General\SkillResource;
use Illuminate\Http\Resources\Json\JsonResource;

class TeacherResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'email' => $this->email,
            'phone' => $this->phone,
            'first_name' => $this->first_name,
            'second_name' => $this->second_name,
            'name' => $this->name,
            'username' => $this->username,
            'company_name' => $this->company_name,
            'company_position' => $this->company_position,
            'company_description' => $this->company_description,
            'description' => $this->description,
            'skills' => SkillResource::collection($this->skills),
            'roles' => $this->roles()->pluck('name')->toArray()
        ];
    }
}
