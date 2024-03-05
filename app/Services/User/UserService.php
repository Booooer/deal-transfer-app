<?php

namespace App\Services\User;

use App\Repositories\UserRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Prettus\Validator\Exceptions\ValidatorException;

class UserService
{
    public function __construct(
        private UserRepository $repository
    ){
    }

    public function changeUserDepartment($id,$department_id): void
    {
        DB::beginTransaction();
        try {
            $this->repository->update([
                "department_id" => $department_id
            ], $id);
            DB::commit();
        } catch (ValidatorException $e) {
            Log::channel('b24')->error($e->getMessage());
            DB::rollBack();
        }
    }

    public function changeUserDepartmentIfExists($request): void
    {
        $user = $this->repository->findUser($request->bitrix_id);

        if ($user) {
            $this->repository->changeUserDepartment($user->id,$request->department);
        }
    }
    public function addRights(int $bitrix_id): void
    {

    }

    public function removeRights(int $bitrix_id): void
    {

    }
}
