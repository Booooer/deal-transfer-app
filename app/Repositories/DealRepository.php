<?php

namespace App\Repositories;

use App\Models\Deal;
use App\Repositories\Interfaces\DepartmentRepositoryInterface;
use Prettus\Repository\Eloquent\BaseRepository;

class DealRepository extends BaseRepository implements DepartmentRepositoryInterface
{

    public function model(): string
    {
        return Deal::class;
    }
}
