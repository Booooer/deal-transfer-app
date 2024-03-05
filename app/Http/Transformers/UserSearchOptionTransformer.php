<?php

namespace App\Http\Transformers;

use App\Data\User\B24UserDTO;
use League\Fractal\TransformerAbstract;

class UserSearchOptionTransformer extends TransformerAbstract
{
    /**
     * List of resources to automatically include
     *
     * @var array
     */
    protected array $defaultIncludes = [
        //
    ];

    /**
     * List of resources possible to include
     *
     * @var array
     */
    protected array $availableIncludes = [
        //
    ];

    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(B24UserDTO $user): array
    {
        return [
            'name' => $user->fullname,
            'bitrix_id' => $user->bitrixId,
        ];
    }
}
