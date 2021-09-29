<?php

namespace Wearesho\Streamtele\Authorization;

use Wearesho\Streamtele\ConfigInterface;

interface AuthHandlerInterface
{
    public function authorize(ConfigInterface $config): \Psr\Http\Message\ResponseInterface;
}
