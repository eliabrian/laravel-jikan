<?php

namespace Eliabrian\LaravelJikan\Jikan;

use Illuminate\Support\Facades\Http;

class Jikan
{
    public const PROTOCOL_JIKAN = 'https';
    public const API_URL_JIKAN = 'api.jikan.moe';
    public const API_VERSION_JIKAN = 'v4';

    /**
     * @var int $id
     */
    protected int $id;

    /**
     * @var string $type
     */
    protected string $type;

    /**
     * @var array $queryParameters
     */
    protected array $queryParameters = [];

    /**
     * @var array
     */
    protected array $response;

    /**
     * Call JIkan API.
     * 
     * @param string $method
     * @param string $uri
     * 
     * @return mixed
     */
    protected function call(string $method, string $uri): mixed
    {
        switch ($method) {
            default:
            case 'GET':
                if (empty($this->id)) {
                    $this->response = Http::get(
                        url: self::PROTOCOL_JIKAN . "://" . self::API_URL_JIKAN . '/' . self::API_VERSION_JIKAN . '/' . $uri, 
                        query: $this->queryParameters)
                        ->json();
                    break;
                } else {
                    $parameters = [
                        'endpoint' => self::PROTOCOL_JIKAN . "://" . self::API_URL_JIKAN,
                        'version' => self::API_VERSION_JIKAN,
                        'uri' => $uri,
                        'type' => $this->type ?? '',
                        'id' => $this->id,
                    ];
    
                    $this->response = Http::withUrlParameters(parameters: $parameters)
                        ->get('{+endpoint}/{version}/{uri}/{id}/{type}')
                        ->json();
                }
        }

        return $this->response;
    }
}