<?php

namespace App\Http\Controllers;

use App\Services\B24\B24FunnelService;
use App\Services\Funnel\FunnelService;
use App\Http\Transformers\FunnelSearchOptionTransformer;
use Prettus\Repository\Exceptions\RepositoryException;

class FunnelController extends Controller
{
    public function __construct(
        private readonly B24FunnelService $b24Service,
        private readonly FunnelService $service
    ){
    }

    /**
     * @throws RepositoryException
     */
    public function index(): array
    {
        $funnels = $this->service->searchFunnels();

        return $this->transform($funnels->funnels,FunnelSearchOptionTransformer::class);
    }

    public function store()
    {
        $funnels = collect($this->b24Service->findActiveFunnels())->get("result");

        if ($funnels) {
            $this->service->createFunnelsIfNotExists($funnels);

            return response("funnels successfully updated",200);
        }

        return response("b24 rest api is not working, please check this out",500);
    }
}
