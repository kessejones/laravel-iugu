<?php

namespace Iugu\Requests;

use GuzzleHttp\Client;
use GuzzleHttp\Middleware;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Exception\ClientException;

use \Iugu\Requests\Exceptions\NotFoundException;

abstract class AbstractRequest
{
    private $client;
    private $base;
    private $headers = [];
    private $user_token;

    const BASE_URI = 'https://api.iugu.com/v1/';

    /**
     * Create new Request
     * @param string $user_token
     */
    public function __construct($user_token)
    {
        $this->user_token = $user_token;
        $this->base = base64_encode(getenv('IUGU_APIKEY') . ':');

        
        $this->client = new Client([
            'base_uri' => self::BASE_URI,
            'timeout' => 15.0
        ]);

        $this->headers = [
            'Authorization' => 'Basic ' . base64_encode($this->user_token . ':'),
            'X-Request-With' => 'XMLHttpRequest',
            'Content-Type' => 'application',
        ];
    }

    /**
     * Request generic
     * @param string $uri
     * @param string $method
     * @param array $headers
     * @param array $data
     * @return Response
     */
    protected function request($uri, $method = 'GET', $headers = [], $data = [])
    {
        try
        {
            $response = $this->client->request($method, $uri, [
                'json' => $data,
                'headers' => array_merge($this->headers, $headers),
            ]);

            return $response;
        }
        catch(ClientException $e)
        {
            $response = $e->getResponse();
            if($response->getStatusCode() === 404)
            {
                throw new NotFoundException($e);
            }
        }
    }

    /**
     * Parse JSON to object
     * @param Response $response
     * @return object
     */
    protected function parseResponse($response)
    {
        return (object)json_decode($response->getBody());
    }
}
