<?php

namespace App\Repositories;

use App\Models\CashbackCoupon;
use App\Repositories\BaseRepository;

class CashbackCouponRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'title',
        'category_id',
        'branch_id',
        'cashback_percentage',
        'cashback_percentage_sys'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return CashbackCoupon::class;
    }
}
