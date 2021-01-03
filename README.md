# Synology Chat for Laravel 5

A simple [Laravel 5](http://www.laravel.com/) service provider for including the Synology Chat

## Installation

The Synology Chat Service Provider can be installed via [Composer](http://getcomposer.org) by requiring the
`auoyi/synology` package and setting the `minimum-stability` to `dev` (required for Laravel 5) in your
project's `composer.json`.

```json
{
  "require": {
    "laravel/framework": "5.0.*",
    "auoyi/synology": "1.0.*"
  },
  "minimum-stability": "dev"
}
```

or

Require this package with composer:

```
composer require auoyi/synology
```

Update your packages with `composer update` or install with `composer install`.

## Usage

To use the Synology Chat Service Provider, you must register the provider when bootstrapping your Laravel application. There are
essentially two ways to do this.

Find the `providers` key in `config/app.php` and register the Synology Chat Service Provider.

for Laravel 5.1+

```php
    'providers' => [
        // ...
        Auoyi\Synology\SynologyChatServiceProvider::class,
    ]
```

Find the `aliases` key in `config/app.php`.

for Laravel 5.1+

```php
    'aliases' => [
        // ...
        'SynologyChat' => Auoyi\Synology\Facades\SynologyChat::class,
    ]
```

## Configuration

To use your own settings, publish config.

`$ php artisan vendor:publish`

`config/synology.php`

```php
return [
    'SYNOLOGY_CHAT_WEBHOOK_URL' => env('SYNOLOGY_CHAT_WEBHOOK_URL', ''),
    // ...
];
```

## Example Usage

```php

    use Auoyi\Synology\Facades\SynologyChat;
    $result = SynologyChat::pushMessage('Hello Synology', [1]);
    pr($result);

```

^\_^

## Links

- [How to configure webhooks](https://www.synology.com/en-global/knowledgebase/DSM/tutorial/Collaboration/How_to_configure_webhooks_and_slash_commands_in_Chat_Integration)
