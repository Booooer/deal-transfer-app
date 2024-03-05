<?php

namespace App\Services\B24;

class B24DepartmentService extends B24Service
{
    const GET_DP_METHOD = "department.get.json";

    public function findDepartments(object $request)
    {
        $options = [];

        $url = env("B24_WEBHOOK") . self::GET_DP_METHOD;

        $this->setPostFields($options,$url);

        return json_decode(curl_exec($this->curl));
    }
}
