<?php

namespace Wearesho\Streamtele\Authorization;

use Wearesho\Streamtele\ConfigInterface;
use Psr;

class TokenProvider implements TokenProviderInterface
{
    protected Psr\SimpleCache\CacheInterface $cache;
    protected AuthHandlerInterface $authHandler;

    protected array $responses = [];

    public function __construct(
        Psr\SimpleCache\CacheInterface $cache
    ) {
        $this->cache = $cache;
    }

    /**
     * @throws Psr\SimpleCache\InvalidArgumentException
     */
    public function getToken(ConfigInterface $config): string
    {
        $cacheKey = $this->getCacheKey($config);
        if (array_key_exists($cacheKey, $this->responses)) {
            return $this->responses[$cacheKey];
        }
        if (!is_null($cache = $this->cache->get($cacheKey))) {
            return $this->responses[$cacheKey] = $cache;
        }

        $this->responses[$cacheKey] = $response = json_decode(
            $this->authHandler->authorize($config)->getBody()->getContents()
        );

        $this->cache->set(
            $cacheKey,
            $response['access_token'],
            $response['expires_in']
        );

        return $response['access_token'];
    }

    protected function getCacheKey(ConfigInterface $config): string
    {
        return "streamtele.authorization."
            . sha1($config->getPassword() . $config->getEmail());
    }
}
