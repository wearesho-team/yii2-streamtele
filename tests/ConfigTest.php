<?php

declare(strict_types=1);

namespace Wearesho\Streamtele\Tests;

use PHPUnit\Framework\TestCase;
use Wearesho\Streamtele;

/**
 * Class ConfigTest
 * @package Wearesho\Delivery\Lifecell\Tests
 */
class ConfigTest extends TestCase
{
    protected Streamtele\Config $config;

    protected function setUp(): void
    {
        parent::setUp();
        $this->config = new Streamtele\Config();
    }

    public function testGetAuth(): void
    {
        $this->config->callbackUrl = 'https://example.com/callback?secret=1234567';

        $this->assertEquals(
            'https://example.com/callback?secret=1234567',
            $this->config->getCallbackUrl()
        );
    }

    public function testGetEmail(): void
    {
        $this->config->email = 'exampleEmail';
        $this->assertEquals(
            'exampleEmail',
            $this->config->getEmail()
        );
    }

    public function testGetPassword(): void
    {
        $this->config->password = 'examplePassword';
        $this->assertEquals(
            'examplePassword',
            $this->config->getPassword()
        );
    }
}
