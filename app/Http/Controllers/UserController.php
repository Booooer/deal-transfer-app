<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\ChangeUserRequest;
use App\Http\Requests\User\SearchUserRequest;
use App\Http\Transformers\UserSearchOptionTransformer;
use App\Services\B24\B24UserService;
use App\Services\User\UserService;

class UserController extends Controller
{
    public function __construct(
        private readonly UserService $service,
        private readonly B24UserService $b24Service
    ){
    }

    public function index(SearchUserRequest $request): array
    {
        $users =  $this->b24Service->searchUsersByName($request);

        return $this->transform($users->users, UserSearchOptionTransformer::class);
    }

    public function update(ChangeUserRequest $request): void
    {
        if ($this->b24Service->changeUserDepartment($request)) {
            $this->service->changeUserDepartmentIfExists($request);
        }
    }

    public function store(ChangeUserRequest $request): void
    {
        $this->service->addRights($request->bitrix_id);
    }

    public function destroy(ChangeUserRequest $request): void
    {
        $this->service->removeRights($request->bitrix_id);
    }

}


