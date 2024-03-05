<?php

namespace App\Services\Department;

use App\Data\Department\DepartmentDTO;
use App\Data\Department\DepartmentGetJsonData;
use App\Models\Department;
use App\Repositories\DepartmentRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Prettus\Repository\Exceptions\RepositoryException;
use Prettus\Validator\Exceptions\ValidatorException;

class DepartmentService
{
    public function __construct(
        private DepartmentRepository $repository
    )
    {
    }

    public function fillDatabase($departments): void
    {
        DB::beginTransaction();
        try {
            foreach ($departments as $department) {
                $this->repository->firstOrCreate([
                    "bitrix_id" => $department->ID,
                    "title" => $department->NAME,
                    "tenant_id" => 1 // dev
                ]);
            }
            DB::commit();
        } catch (ValidatorException $e) {
            Log::channel('custom')->error($e->getMessage());
            DB::rollBack();
        }
    }

    /**
     * @throws RepositoryException
     */
    public function findDepartmentByName(): DepartmentGetJsonData
    {
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));

        $departments = $this->repository->all();

        return DepartmentGetJsonData::from(compact('departments'));
    }
}
