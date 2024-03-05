<?php

namespace App\Services\Funnel;

use App\Data\Funnel\FunnelGetJsonData;
use App\Repositories\FunnelRepository;
use Prettus\Repository\Exceptions\RepositoryException;

class FunnelService
{
    public function __construct(
        private readonly FunnelRepository $repository
    ){
    }

    public function createFunnelsIfNotExists(array $funnels): void
    {
        $this->repository->fillFunnels($funnels);
    }

    /**
     * @throws RepositoryException
     */
    public function searchFunnels(): FunnelGetJsonData
    {
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));

        $funnels = $this->repository->all();

        return FunnelGetJsonData::from(compact('funnels'));
    }


    public function getFunnels(): FunnelGetJsonData
    {
        $funnels = $this->repository->findWhereIn('tenant_id',[1]);

        return FunnelGetJsonData::from(compact('funnels'));
    }
}
