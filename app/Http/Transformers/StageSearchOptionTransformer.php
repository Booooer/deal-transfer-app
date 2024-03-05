<?php

namespace App\Http\Transformers;

use App\Data\Stage\B24StageDTO;
use League\Fractal\TransformerAbstract;

class StageSearchOptionTransformer extends TransformerAbstract
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
     * @param B24StageDTO $stage
     * @return array
     */
    public function transform(B24StageDTO $stage): array
    {
        return [
            'bitrixId' => $stage->bitrixId,
            'title' => $stage->title
        ];
    }
}
