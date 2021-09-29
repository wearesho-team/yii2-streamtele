<?php

declare(strict_types=1);

namespace Wearesho\Streamtele\Authorization;

use Wearesho\Streamtele\ConfigInterface;

interface TokenProviderInterface
{
    public function getToken(ConfigInterface $config): string;
}