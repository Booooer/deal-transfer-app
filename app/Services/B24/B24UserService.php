<?php

namespace App\Services\B24;

use App\Data\User\B24UserDTO;
use App\Data\User\B24UserGetJsonData;
use Illuminate\Support\Collection;

class B24UserService extends B24Service
{
    /**
     * @param $request
     * @return B24UserGetJsonData
     */
    public function searchUsersByName($request): B24UserGetJsonData
    {
        $users =  json_decode($this->callMethod('user.get.json', [
            "%LAST_NAME" => $request->name
        ]));

        return B24UserGetJsonData::from($users);
    }

    public function changeUserDepartment($request): bool|string
    {
        return json_decode($this->callMethod('user.update.json', [
            "ID" => $request->bitrixId,
            "UF_DEPARTMENT" => $request->department
        ]));
    }
}
