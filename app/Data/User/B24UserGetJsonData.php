<?php

namespace App\Data\User;

use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Contracts\TransformableData;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

class B24UserGetJsonData extends Data implements TransformableData
{
    #[MapInputName('result'),DataCollectionOf(B24UserDTO::class)]
    public DataCollection $users;
}
