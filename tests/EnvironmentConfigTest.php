<?php

namespace Wearesho\Streamtele\Tests;

use PHPUnit\Framework\TestCase;
use Wearesho\Streamtele;

class EnvironmentConfigTest extends TestCase
{
    protected Streamtele\EnvironmentConfig $config;

    protected function setUp(): void
    {
        parent::setUp();
        $this->config = new  Streamtele\EnvironmentConfig;
    }

    public function testGetCallbackUrl(): void
    {
        putenv('STREAMTELE_CALLBACK_URL=https://example.com/callback?secret=1234567');
        $this->assertEquals('https://example.com/callback?secret=1234567', $this->config->getCallbackUrl());
    }

    public function testGetEmail(): void
    {
        putenv('STREAMTELE_EMAIL=exampleEmail');
        $this->assertEquals('exampleEmail', $this->config->getEmail());
    }
    public function testGetPassword(): void
    {
        putenv('STREAMTELE_PASSWORD=examplePassword');
        $this->assertEquals('examplePassword', $this->config->getEmail());
    }
}
