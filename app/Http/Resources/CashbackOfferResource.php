<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CashbackOfferResource extends JsonResource
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
            'category_id' => $this->category_id,
            'branch_id' => $this->branch_id,
            'Title' => $this->Title,
            'description' => $this->description,
            'image' => $this->image,
            'points' => $this->points,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
