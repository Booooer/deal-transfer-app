<?php

namespace App\Data\Funnel;

use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Contracts\TransformableData;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

class FunnelGetJsonData extends Data implements TransformableData
{
    #[DataCollectionOf(FunnelDTO::class)]
    public DataCollection $funnels;
}
