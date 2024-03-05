<?php

namespace App\Services\B24;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;

class B24Service
{
    private PendingRequest $client;
    public function __construct()
    {
        $this->client = HTTP::baseUrl(config('b24.base_url'))->withHeaders([
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ])->timeout(3600);
    }

    public function callMethod(string $method, $data): string
    {
        return $this->client->post($method, $data)->body();
    }
}
