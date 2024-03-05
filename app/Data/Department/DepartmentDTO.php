<?php

namespace App\Data\Department;

use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Contracts\TransformableData;
use Spatie\LaravelData\Data;

class DepartmentDTO extends Data implements TransformableData
{
    public function __construct(
        #[MapInputName('title')]
        public string $name,
        #[MapInputName('bitrix_id')]
        public int $bitrixId,
    ){
    }

    public function getResourceKey(): string
    {
        return "OptionDepartment";
    }
}
