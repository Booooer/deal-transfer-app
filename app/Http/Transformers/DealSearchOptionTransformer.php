<?php

namespace App\Http\Transformers;

use App\Data\Deal\B24DealDTO;
use App\Models\Department;
use League\Fractal\TransformerAbstract;

class DealSearchOptionTransformer extends TransformerAbstract
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
    public function transform(B24DealDTO $deal): array
    {
        return [
            'title' => $deal->title,
            'bitrixId' => $deal->bitrixId,
            'responsibleId' => $deal->responsibleId,
            'stageId' => $deal->stageId
        ];
    }
}
