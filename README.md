# StreamTele Integration

## Installation

```bash
composer require  wearesho-team/yii2-streamtele
```

## Usage

### Configuration

[ConfigInterface](./src/ConfigInterface.php) have to be used to configure requests. Available implementations:
- [Config](./src/Config.php) - simple implementation using class properties
- [EnvironmentConfig](./src/EnvironmentConfig.php) - loads configuration values from environment using
  [getenv](http://php.net/manual/ru/function.getenv.php)

| Variable                | Description                                   |
|-------------------------|-----------------------------------------------|
| STREAMTELE_CALLBACK_URL | Request that will be initiated after the call |
| STREAMTELE_PASSWORD     | Streamtele password                           |
| STREAMTELE_EMAIL        | Streamtele email                              |


### Usage example


```php
<?php

use Wearesho\Streamtele;

$config = new Streamtele\Config();
$config->callbackUrl = 'https://example.com/callback?secret=1234567';
$config->email = 'exampleEmail';
$config->password = 'examplePassword';

$service = new Streamtele\Service($config);
$service->send('380000000000');
```

## License

[MIT](./LICENSE)
