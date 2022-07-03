<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class StepResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        //return parent::toArray($request);

        return [
            'id' => $this->id,
            'step_count' => $this->start_time,
            'start_time' => $this->start_time,
            'end_time' => $this->end_time,
            'user' => UserResource::make($this->whenLoaded('user')),
        ];
    }
}
