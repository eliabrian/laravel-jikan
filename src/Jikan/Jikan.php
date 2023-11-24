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
    protected function call(string $method = "GET", array $urlParameters = [], array $queryParameters = []): mixed
    {
        switch ($method) {
            default:
            case 'GET':
                return $this->response = $this->buildUrl(urlParameters: $urlParameters, queryParameters: $queryParameters)->json();
                break;
        }
    }

    private function buildUrl(array $urlParameters = [], array $queryParameters = []): object
    {
        if (isset($this->id) || isset($this->type)) {
            $urlParameters['id'] = $this->id;
            $urlParameters['type'] = $this->type ?? '';
        }

        $parameters = array_merge([
            'domain' => self::PROTOCOL_JIKAN . "://" . self::API_URL_JIKAN,
            'version' => self::API_VERSION_JIKAN,
        ], $urlParameters);
        
        $urlFormat = "{+domain}/{version}/";

        foreach ($urlParameters as $key => $value) {
            $urlFormat .= "{" . $key . "}/";
        }

        return Http::withUrlParameters(parameters: $parameters)
            ->get(url: $urlFormat, query: $queryParameters);
    }
}