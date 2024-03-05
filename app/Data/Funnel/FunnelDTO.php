<?php

namespace App\Data\Funnel;

use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Contracts\TransformableData;
use Spatie\LaravelData\Data;

class FunnelDTO extends Data implements TransformableData
{
    public function __construct(
        #[MapInputName('id')]
        public int $id,
        #[MapInputName('title')]
        public string $title,
        #[MapInputName('bitrix_id')]
        public int $bitrixId,
    ){
    }

    public function getResourceKey(): string
    {
        return "OptionFunnel";
    }
}
