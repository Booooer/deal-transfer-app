<?php

namespace App\Http\Transformers;

use App\Data\Funnel\FunnelDTO;
use League\Fractal\TransformerAbstract;

class FunnelSearchOptionTransformer extends TransformerAbstract
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
    public function transform(FunnelDTO $funnel): array
    {
        return [
            'id' => $funnel->id,
            'title' => $funnel->title,
            'bitrixId' => $funnel->bitrixId
        ];
    }
}
