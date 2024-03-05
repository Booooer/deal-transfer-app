<?php

namespace App\Repositories;

use App\Repositories\Interfaces\DepartmentRepositoryInterface;
use App\Models\Department;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Exceptions\RepositoryException;

class DepartmentRepository extends BaseRepository implements DepartmentRepositoryInterface
{
    protected $fieldSearchable = [
        'title' => 'like',
    ];

    /**
     * @throws RepositoryException
     */
    public function boot(): void
    {
        $this->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
    }

    public function model(): string
    {
        return Department::class;
    }
}
