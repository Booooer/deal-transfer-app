<?php

namespace App\Data\Stage;

use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Contracts\TransformableData;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

class B24StageGetJsonData extends Data implements TransformableData
{
    #[MapInputName('result'),DataCollectionOf(B24StageDTO::class)]
    public DataCollection $stages;
}
