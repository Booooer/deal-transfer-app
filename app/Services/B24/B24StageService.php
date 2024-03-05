<?php

namespace App\Services\B24;

use App\Data\Stage\B24StageGetJsonData;

class B24StageService extends B24Service
{
    public function searchStages(array $funnel): B24StageGetJsonData
    {
        $stages = json_decode($this->callMethod('crm.dealcategory.stage.list',[
            'id' => $funnel['bitrixId']
        ]));

        return B24StageGetJsonData::from($stages);
    }
}
