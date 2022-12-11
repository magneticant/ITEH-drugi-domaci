<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AppointmentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public static $wrap = 'appointment';
    public function toArray($request)
    {
        return [
            'id'=>$this->resource->id,  
            'department'=>$this->resource->department,
            'room'=>$this->resource->room,
            'date'=>$this->resource->date,
            'user_id'=>$this->resource->user_id,
            'doctor_id'=>$this->resource->doctor_id,  
        ];
    }
}
