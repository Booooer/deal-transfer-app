<?php

namespace App\Http\Controllers;

use App\Http\Requests\Department\SearchDepartmentRequest;
use App\Http\Resources\SearchDepartmentCollection;
use App\Http\Transformers\DepartmentSearchOptionTransformer;
use App\Services\B24\B24DepartmentService;
use App\Services\Department\DepartmentService;
use Prettus\Repository\Exceptions\RepositoryException;

class DepartmentController extends Controller
{
    public function __construct(
        private readonly B24DepartmentService $b24Service,
        private readonly DepartmentService    $service
    ){
    }

    /**
     * @throws RepositoryException
     */
    public function index(): array
    {
        $departments = $this->service->findDepartmentByName();

        return $this->transform($departments->departments,DepartmentSearchOptionTransformer::class);
    }

    public function store(): void // Доделать
    {
        $departments = collect($this->b24Service->findDepartments())
            ->get('result');
//
//        $this->service->fillDatabase($departments);
    }

    public function update()
    {

    }
}
