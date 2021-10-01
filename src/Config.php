<?php

declare(strict_types=1);

namespace Wearesho\Streamtele;

class Config implements ConfigInterface
{
    public ?string $password;
    public ?string $callbackUrl;
    public ?string $email;

    public function getCallbackUrl(): string
    {
        return $this->callbackUrl;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function getEmail(): string
    {
        return $this->email;
    }
}
