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
    public function toArray($request)
    {
        return [
            'id'=> $this->id,
            'name' => $this->name,
            'email'=> $this->email,
            'tel' => $this->tel,
            'status'=> $this->status,
            'address' => $this->address,
            'age'=> $this->age,
            'valid' => $this->valid,
            'company'=> $this->company->name,
            'role' => $this->role->name,
        ];
    }
}
