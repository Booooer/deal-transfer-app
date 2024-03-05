<?php

namespace App\Services\B24;

use App\Data\Deal\B24DealDTO;
use App\Data\Deal\B24DealGetJsonData;
use App\Models\Stage;
use App\Repositories\FunnelRepository;
use App\Repositories\StageRepository;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Nette\Schema\ValidationException;

class B24DealService extends B24Service
{
    public function __construct(
        private readonly StageRepository  $stageRepository,
        private readonly FunnelRepository $funnelRepository,
    )
    {
        parent::__construct();
    }

    private function callRest($request,int $start = 0): string
    {
        return $this->callMethod("crm.deal.list", [
            'select' => [
                "ID", "STAGE_ID", "TITLE", "CLOSED", "ASSIGNED_BY_ID"
            ],
            'filter' => [
                "ASSIGNED_BY_ID" => $request->userBitrixId,
                "CATEGORY_ID" => $request->oldFunnelId,
                "CLOSED" => $request->haveClosed
            ],
            'start' => $start
        ]);
    }

    public function searchDeals($request): B24DealGetJsonData
    {
        $deals = json_decode($this->callRest($request));

        $countDeals = $deals->total ?? 0;

        if ($countDeals > 50) {
            $arDeals = $deals->result;

            for ($i = 50; $i < $countDeals; $i += 50) {
                $newDeals = json_decode($this->callRest($request,$i));
                $arDeals = array_merge($arDeals,$newDeals->result);
            }

            $result['result'] = $arDeals;

            return B24DealGetJsonData::from($result);
        }

        return B24DealGetJsonData::from($deals);
    }

    private function getCommands(array $deals, $request): array
    {
        $commands = [];

        foreach ($deals as $deal) {
            $newStageId = $this->findSimilarStage($deal['stageId'], $request->newFunnelId);

            if (!$newStageId) {
                continue;
            }

            $stageId = $newStageId[0]->bitrix_id;
            $dealId = $deal['bitrixId'];

            $commands[] .= "crm.deal.update?id=$dealId&fields[STAGE_ID]=$stageId&fields[UF_CRM_1706187447]=$request->newFunnelId&fields[UF_CRM_1706248547]=Y";
        }

        return $commands;
    }

    public function changeDealFunnel(array $deals, $request): void
    {
        try {
            $commands = $this->getCommands($deals, $request);

            for ($i = 0; $i < count($commands); $i += 50) {
                $currentCommands = array_slice($commands,$i,$i + 50);

                $this->callMethod('batch', [
                    'halt' => 0,
                    'cmd' => $currentCommands
                ]);
            }

        } catch (ValidationException $e) {

        }
    }

    private function findSimilarStage(string $stageId, int $newFunnelId) : Collection|bool
    {
        $currentStage = $this->stageRepository->findWhere([
            'bitrix_id' => $stageId,
            'tenant_id' => 1,
        ]);

        $funnelId = $this->findFunnelId($newFunnelId);

        if ($currentStage->isEmpty() || $funnelId->isEmpty()) {
            return false;
        }

        $res = $this->stageRepository->findWhere([
            'title' => $currentStage[0]->title,
            'tenant_id' => 1,
            'funnel_id' => $funnelId[0]->id
        ]);

        if ($res->isEmpty()) {
            return false;
        }

        return $res;
    }

    private function findFunnelId($id): Collection
    {
        return $this->funnelRepository->findWhere([
            'bitrix_id' => $id,
            'tenant_id' => 1
        ]);
    }
}
