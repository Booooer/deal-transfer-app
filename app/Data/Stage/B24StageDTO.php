<?php

namespace App\Data\Stage;

use Spatie\LaravelData\Attributes\Computed;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Contracts\TransformableData;
use Spatie\LaravelData\Data;

class B24StageDTO extends Data implements TransformableData
{
    public function __construct(
        #[MapInputName('NAME')]
        public string $title,
        #[MapInputName('STATUS_ID')]
        public mixed $bitrixId
    ){
    }


    public function getResourceKey(): string
    {
        return 'B24DealOption';
    }
}
