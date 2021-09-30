<?php

declare(strict_types=1);

namespace Wearesho\Streamtele;

use GuzzleHttp;
use Wearesho\Streamtele\Authorization\AuthHandler;
use Wearesho\Streamtele\Authorization\TokenProviderInterface;

class Service
{
    protected GuzzleHttp\ClientInterface $client;
    protected ConfigInterface $config;
    protected TokenProviderInterface $tokenProvider;

    protected const BASE_URI = "https://callcheck.streamtele.com/api/v1/task";

    public function __construct(
        ConfigInterface $config,
        GuzzleHttp\ClientInterface $client,
        TokenProviderInterface $tokenProvider
    ) {
        $this->client = $client;
        $this->config = $config;
        $this->tokenProvider = $tokenProvider;
    }

    /**
     * @throws GuzzleHttp\Exception\GuzzleException
     */
    public function send(string $phone)
    {
        $request = new GuzzleHttp\Psr7\Request(
            'POST',
            static::BASE_URI,
            [
                'Authorization' => 'Bearer ' . $this->tokenProvider->getToken($this->config),
                'Content-Type' => 'application/json',
            ],
            json_encode(
                [
                    "phone" => $phone,
                    "callback_url" => $this->config->getCallbackUrl(),
                ]
            )
        );
        $this->client->send($request);
    }
}
