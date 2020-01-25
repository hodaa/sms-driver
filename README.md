# SMS driver
This package allows you to switch between drivers or use default driver in your config file.
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
]
```