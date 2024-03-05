<?php

namespace App\Data\User;

use Spatie\LaravelData\Attributes\Computed;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Contracts\TransformableData;
use Spatie\LaravelData\Data;

class B24UserDTO extends Data implements TransformableData
{
    #[MapInputName('ID')]
    public int $bitrixId;

    public function __construct(
        #[Computed]
        public $fullname,
        #[MapInputName('NAME')]
        public string $name,
        #[MapInputName('LAST_NAME')]
        public string $lastName
    )
    {
        $this->fullname = implode(' ', [$this->name, $this->lastName]);
    }


    public function getResourceKey()
    {
        return 'B24UserOption';
    }
}
