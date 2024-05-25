<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CashbackCouponResource extends JsonResource
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
            'title' => $this->title,
            'category_id' => $this->category_id,
            'branch_id' => $this->branch_id,
            'cashback_percentage' => $this->cashback_percentage,
            'cashback_percentage_sys' => $this->cashback_percentage_sys,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
