<?php

namespace App\Services\B24;

class B24FunnelService extends B24Service
{
    const GET_FUNNELS_METHOD = "crm.dealcategory.list";

    public function findActiveFunnels()
    {
        $options = [
            "filter" => [
                "IS_LOCKED" => "N"
            ],
            "order" => [
                "SORT" => "ASC"
            ]
        ];

        $url = env("B24_WEBHOOK") . self::GET_FUNNELS_METHOD;

        $this->setPostFields($options, $url);

        return json_decode(curl_exec($this->curl));
    }
}
