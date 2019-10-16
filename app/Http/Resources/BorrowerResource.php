<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BorrowerResource extends JsonResource
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
            'age' => $this->age,
            'birthday' => $this->birthday->format('M. d, Y'),
            'full_name' => $this->full_name
        ];
    }
}
