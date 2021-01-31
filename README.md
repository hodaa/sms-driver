![Codacy Badge](https://api.codacy.com/project/badge/Grade/6b7c8831c69249588f5bb33add5313ce)

# SMS driver

[![Codacy Badge](https://api.codacy.com/project/badge/Grade/1aba7f28f3f64c59b5d9888f6f33119b)](https://app.codacy.com/gh/hodaa/sms-driver?utm_source=github.com&utm_medium=referral&utm_content=hodaa/sms-driver&utm_campaign=Badge_Grade)

This package allows you to switch between drivers or use default driver from your config file.
## Installation

This package can be used in Laravel 5.3 or higher.

You can install the package via composer:

``` bash
composer require hoda/sms
```

The service provider will automatically get registered. Or you may manually add the service provider in your `config/app.php` file:

```php
'providers' => [
    // ...
    Hoda\SMS\SmsServiceProvider::class,
];

'aliases' => [
  'SMS'   =>  Hoda\SMS\SmsFacade::class,
];
```

```shell
php artisan vendor:publish
```

### Add your driver credential to env file 

```shell
NEXMO_KEY=
NEXMO_SECRET=
``` 

## usage
``` dotenv
 SMS::channel('nexmo')->to('201069642842')->message('This your message')->send();
```

## Test
``` shell
 vendor/bin/phpunit tests
```
