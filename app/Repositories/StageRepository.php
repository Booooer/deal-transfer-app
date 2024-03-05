<?php

namespace App\Repositories;

use App\Models\Stage;
use App\Repositories\Interfaces\StageRepositoryInterface;
use Prettus\Repository\Eloquent\BaseRepository;

class StageRepository extends BaseRepository implements StageRepositoryInterface
{

    public function model(): string
    {
        return Stage::class;
    }

}
