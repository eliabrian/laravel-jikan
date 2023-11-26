<?php

namespace Eliabrian\LaravelJikan\Jikan;

use Illuminate\Support\Facades\Http;

class Jikan
{
    public const PROTOCOL_JIKAN = 'https';
    public const API_URL_JIKAN = 'api.jikan.moe';
    public const API_VERSION_JIKAN = 'v4';

    /**
     * @var array $urlParameters
     */
    protected array $urlParameters = [];

    /**
     * @var int $id
     */
    protected int $id;

    /**
     * @var string $type
     */
    protected string $type = '';

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
    protected function call(string $method = "GET"): mixed
    {
        switch ($method) {
            default:
            case 'GET':
                return $this->response = $this->buildUrl()->json();
                break;
        }
    }

    private function buildUrl(): object
    {
        $parameters = array_merge([
            'domain' => self::PROTOCOL_JIKAN . "://" . self::API_URL_JIKAN,
            'version' => self::API_VERSION_JIKAN,
            'uri' => $this->uri,
        ], $this->urlParameters);
        
        $urlFormat = "{+domain}/{version}/{uri}/";

        foreach ($this->urlParameters as $key => $value) {
            $urlFormat .= "{" . $key . "}/";
        }

        return Http::withUrlParameters(parameters: $parameters)
            ->get(url: $urlFormat, query: $this->queryParameters);
    }
}