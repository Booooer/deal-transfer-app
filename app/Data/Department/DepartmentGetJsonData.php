<?php

namespace App\Data\Department;

use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Contracts\TransformableData;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

class DepartmentGetJsonData extends Data implements TransformableData
{
    #[DataCollectionOf(DepartmentDTO::class)]
    public DataCollection $departments;
}
