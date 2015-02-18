<?php

namespace Methylbro\Alwaysdata;

use GuzzleHttp\Client as HttpClient;

class Client
{
    const VERSION = 'v1';
    protected $http_client;

    public function __construct($login, $password)
    {
        $this->http_client = new HttpClient([
            'base_url' => ['https://api.alwaysdata.com/{version}/', ['version' => self::VERSION]]
        ]);

        $this->http_client->setDefaultOption('auth', [$login, $password]);
    }

    public function get($path)
    {
        return $this->http_client->get($path)->json();
    }

    public function create($path, $data)
    {
        $request = $this->http_client->createRequest('POST', $path, ['json'=>$data]);

        $response = $this->http_client->send($request);

        if (201===$response->getStatusCode()) {
            return $this->get($response->getHeader('Location'));
        }
    }
}
