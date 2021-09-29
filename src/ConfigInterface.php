<?php

declare(strict_types=1);

namespace Wearesho\Streamtele;

interface ConfigInterface
{
    public function getCallbackUrl(): string;
    public function getPassword(): string;
    public function getEmail(): string;

}