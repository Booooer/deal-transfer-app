<?php

namespace App\Repositories;

use App\Models\Funnel;
use App\Repositories\Interfaces\FunnelRepositoryInterface;
use Illuminate\Support\Facades\Log;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Exceptions\RepositoryException;

class FunnelRepository extends BaseRepository implements FunnelRepositoryInterface
{
    protected $fieldSearchable = [
        'tenant_id',
    ];

    /**
     * @throws RepositoryException
     */
    public function boot(): void
    {
        $this->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
    }

    public function model(): string
    {
        return Funnel::class;
    }
}
