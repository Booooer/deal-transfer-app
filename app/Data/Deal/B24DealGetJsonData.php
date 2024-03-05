<?php

namespace App\Data\Deal;

use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Contracts\TransformableData;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

class B24DealGetJsonData extends Data implements TransformableData
{
    #[MapInputName('result'),DataCollectionOf(B24DealDTO::class)]
    public DataCollection $deals;
}
