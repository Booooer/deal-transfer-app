<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class SearchDepartmentCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        $payload = [];

        foreach ($this as $element) {
            $payload[] = [
                "bitrix_id" => $element->bitrix_id,
                "name" => $element->title,
            ];
        }

        return $payload;
    }
}
