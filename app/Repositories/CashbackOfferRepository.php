<?php

namespace App\Repositories;

use App\Models\CashbackOffer;
use App\Repositories\BaseRepository;

class CashbackOfferRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'category_id',
        'branch_id',
        'Title',
        'description',
        'image',
        'points'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return CashbackOffer::class;
    }
}
