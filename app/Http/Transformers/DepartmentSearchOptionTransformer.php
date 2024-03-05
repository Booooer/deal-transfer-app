<?php

namespace App\Http\Transformers;

use App\Data\Department\DepartmentDTO;
use App\Models\Department;
use League\Fractal\TransformerAbstract;

class DepartmentSearchOptionTransformer extends TransformerAbstract
{
    /**
     * List of resources to automatically include
     *
     * @var array
     */
    protected array $defaultIncludes = [
        //
    ];

    /**
     * List of resources possible to include
     *
     * @var array
     */
    protected array $availableIncludes = [
        //
    ];

    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(DepartmentDTO $department): array
    {
        return [
            'name' => $department->name,
            'bitrixId' => $department->bitrixId
        ];
    }
}
