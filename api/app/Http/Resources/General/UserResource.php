<?php

namespace App\Http\Resources\General;

use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'skills' => SkillResource::collection($this->skills($request->cookie('_role'))->get()),
            'roles' => $this->roles()->pluck('name')->toArray()
        ];
    }
}
