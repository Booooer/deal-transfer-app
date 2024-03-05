<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class SearchUserCollection extends ResourceCollection
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
                "bitrix_id" => $element->ID,
                "name" => $element->LAST_NAME . " " . $element->NAME,
            ];
        }

        return $payload;
    }
}
