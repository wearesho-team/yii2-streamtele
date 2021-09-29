<?php

declare(strict_types=1);

namespace Wearesho\Streamtele;

use Horat1us\Environment;

class EnvironmentConfig extends Environment\Config implements ConfigInterface
{
    public function __construct(string $keyPrefix = 'STREAMTELE_')
    {
        parent::__construct($keyPrefix);
    }

    public function getCallbackUrl(): string
    {
        return $this->getEnv('CALLBACK_URL');
    }

    public function getPassword(): string
    {
        return $this->getEnv('PASSWORD');
    }

    public function getEmail(): string
    {
        return $this->getEnv('EMAIL');
    }
}