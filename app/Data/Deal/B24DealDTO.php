<?php

namespace App\Data\Deal;

use Spatie\LaravelData\Attributes\Computed;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Contracts\TransformableData;
use Spatie\LaravelData\Data;

class B24DealDTO extends Data implements TransformableData
{
    public function __construct(
        #[MapInputName('ASSIGNED_BY_ID')]
        public int $responsibleId,
        #[MapInputName('TITLE')]
        public string $title,
        #[MapInputName('ID')]
        public int $bitrixId,
        #[MapInputName('STAGE_ID')]
        public string $stageId,
    ){
    }


    public function getResourceKey(): string
    {
        return 'B24DealOption';
    }
}
