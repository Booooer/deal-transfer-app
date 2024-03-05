<?php

namespace App\Http\Controllers;

use App\Http\Transformers\FunnelSearchOptionTransformer;
use App\Http\Transformers\StageSearchOptionTransformer;
use App\Services\B24\B24StageService;
use App\Services\Funnel\FunnelService;
use App\Services\Stage\StageService;

class StageController extends Controller
{
    public function __construct(
        private readonly FunnelService   $funnelService,
        private readonly B24StageService $b24Service,
        private readonly StageService    $service,
    ){
    }

    public function store(): void
    {
        $result = $this->funnelService->getFunnels();

        $funnels = $this->transform($result->funnels,FunnelSearchOptionTransformer::class);

        foreach ($funnels['payload'] as $funnel) {
            $result = $this->b24Service->searchStages($funnel);

            $stages = $this->transform($result->stages,StageSearchOptionTransformer::class);

            $this->service->createStagesIfNotExists($stages["payload"],$funnel['id']);
        }
    }
}
