<?php

namespace Eliabrian\LaravelJikan\Jikan;

use Illuminate\Support\Facades\Http;

class Jikan
{
    public const PROTOCOL_JIKAN = 'https';
    public const API_URL_JIKAN = 'api.jikan.moe';
    public const API_VERSION_JIKAN = 'v4';

    protected function callWithId(string $method, ?array $parameters = [], string $uri, ?string $type, int $id)
    {
        switch ($method) {
            default:
            case 'GET':
                $params = [
                    'endpoint' => self::PROTOCOL_JIKAN . "://" . self::API_URL_JIKAN,
                    'version' => self::API_VERSION_JIKAN,
                    'uri' => $uri,
                    'type' => $type,
                    'id' => $id,
                ];

                $response = Http::withUrlParameters($params)->get('{+endpoint}/{version}/{uri}/{id}/{type}');
                break;
        }

        return $response->json();
    }
}