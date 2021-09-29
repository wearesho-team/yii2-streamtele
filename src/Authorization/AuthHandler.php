<?php

namespace Wearesho\Streamtele\Authorization;

use Psr\Http\Message\ResponseInterface;
use Wearesho\Streamtele\ConfigInterface;
use GuzzleHttp;

class AuthHandler implements AuthHandlerInterface
{
    protected GuzzleHttp\ClientInterface $client;

    public function __construct(GuzzleHttp\ClientInterface $client)
    {
        $this->client = $client;
    }

    public function authorize(ConfigInterface $config): ResponseInterface
    {
        $request = $this->getRequest($config);
        return $this->client->send($request);
    }

    private function getRequest(ConfigInterface $config): GuzzleHttp\Psr7\Request
    {
        return new GuzzleHttp\Psr7\Request(
            'POST',
            "https://callcheck.streamtele.com/auth/login",
            [
                'accept' => ' application/json',
                'Content-Type' => 'application/json',
            ],
            json_encode(
                [
                    "email" => $config->getEmail(),
                    "password" => $config->getPassword(),

                ]
            )
        );
    }
}
