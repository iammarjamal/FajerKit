<p align="center">
    <a href="https://github.com/iammarjamal/FajerKit" target="_blank">
        <picture>
            <source media="(prefers-color-scheme: dark)" srcset="#" />
            <source media="(prefers-color-scheme: light)" srcset="#" />
            <img alt="FajerKit Logo" width="240" src="#" />
        </picture>
    </a>
</p>

# FajerKit
A Laravel starter kit with essential packages pre-configured, streamlining setup for a secure, scalable.

## Installation

You can install the package via composer:

```bash
composer require iammarjamal/fajerkit
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="fajerkit-config"
```

"This is the content of the published configuration file below. You can set the package option to false to prevent the package from being installed."

```php
return [
    'laravel' => [

        // Livewire: A full-stack framework for Laravel that simplifies building dynamic UIs.
        // More info: https://livewire.laravel.com/
        'livewire' => true,

        // Volt: An elegantly crafted functional API for Livewire.
        // More info: https://github.com/livewire/volt
        'volt' => true,

        // Laravel Folio: A powerful page based router designed to simplify routing in Laravel applications.
        // More info: https://laravel.com/docs/11.x/folio
        'laravel-folio' => true,

        // Devdojo Auth: DevDojo Auth is an open-source composer package that adds customizable authentication screens to your Laravel application.
        // More info: https://devdojo.com/auth/
        'devdojo-auth' => true,

        // CamelUI: A simple, beautiful, and versatile UI inspired by the Arabian desert.
        // More info: https://camelui.dev/
        'camelui' => true,

        // Laravel PWA: This Laravel package turns your project into a progressive web app.
        // More info: https://github.com/silviolleite/laravel-pwa
        'laravel-pwa' => true,

        // Browser Detect: Easy to use package to identify the visitor's browser details and device type.
        // More info: https://github.com/hisorange/browser-detect
        'browser-detect' => true,

        // Laravel Page Speed: Package to optimize your site automatically which results in a 35%+ optimization.
        // More info: https://github.com/renatomarinho/laravel-page-speed
        'laravel-page-speed' => false,

        // Laravel Horizon: a beautiful dashboard and code-driven configuration for your Laravel powered Redis queues.
        // More info: https://laravel.com/docs/11.x/horizon
        'laravel-horizon' => false,

        // Laravel Pulse: Laravel Pulse delivers at-a-glance insights into your application's performance and usage.
        // More info: https://laravel.com/docs/11.x/pulse
        'laravel-pulse' => false,

    ],

    // Javascript Packages (Node)
    'node' => [

        // TailwindCSS: A utility-first CSS framework for rapidly building custom designs.
        // More info: https://tailwindcss.com/
        'tailwindcss' => true,

    ],
];
```

## Usage

```bash
php artisan fajerkit:install
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
