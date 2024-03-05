<?php

namespace App\Http\Controllers;

use App\Http\Requests\Deal\UpdateDealRequest;
use App\Http\Transformers\DealSearchOptionTransformer;
use App\Models\Funnel;
use App\Services\B24\B24DealService;
use App\Services\Deal\DealService;
use JetBrains\PhpStorm\NoReturn;

class DealController extends Controller
{
    public function __construct(
        private readonly B24DealService $b24Service,
        private readonly DealService    $service
    ){
    }

    public function index()
    {

    }

    #[NoReturn]
    public function update(UpdateDealRequest $request): void
    {
        $result = $this->b24Service->searchDeals($request->validated());

        $deals = $this->transform($result->deals,DealSearchOptionTransformer::class);

        $successTransfers = $this->b24Service->changeDealFunnel($deals['payload'],$request->validated());

        if ($successTransfers) {
            $this->service->storeTransfers($successTransfers);
        }
    }
}
