<?php

namespace App\Repositories;

use App\Models\Admin;
use App\Repositories\BaseRepository;

class AdminRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'email',
        'password',
        'is_active'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Admin::class;
    }
}
