<?php

namespace App\Http\Resources;

use App\Borrower;
use Illuminate\Http\Resources\Json\JsonResource;

class PensionResource extends JsonResource
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
            'pension' => $this->pension,
            'links' => $this->links,
            'borrower' => new BorrowerResource(Borrower::findOrFail($this->borrower_id)),
        ];
    }
}
