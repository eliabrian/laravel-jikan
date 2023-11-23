<?php

namespace Eliabrian\LaravelJikan\Jikan;

use Illuminate\Support\Facades\Http;

class Jikan
{
    public const PROTOCOL_JIKAN = 'https';
    public const API_URL_JIKAN = 'api.jikan.moe';
    public const API_VERSION_JIKAN = 'v4';

    /**
     * Call Jikan API with ID.
     * 
     * @param string $method
     * @param ?array $parameters
     * @param string $uri
     * @param ?string $type
     * @param int $id
     * 
     * @return mixed
     */
    protected function callWithId(string $method, ?array $parameters = [], string $uri, ?string $type, int $id): mixed
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

    /**
     * Call JIkan API without ID.
     * 
     * @param string $method
     * @param array $parameters
     * @param string $uri
     * 
     * @return mixed
     */
    protected function call(string $method, array $parameters = [], string $uri): mixed
    {
        switch ($method) {
            default:
            case 'GET':
                $response = Http::get(self::PROTOCOL_JIKAN . "://" . self::API_URL_JIKAN . '/'
                    . self::API_VERSION_JIKAN . '/' . $uri,  $parameters);
                break;
        }

        return $response->json();
    }
}