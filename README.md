<p class="filament-hidden">
<img src="https://banners.beyondco.de/filament-captcha.png?theme=light&packageManager=composer+require&packageName=marcogermani87%2Ffilament-captcha&pattern=architect&style=style_1&description=Easy+captcha+image+integrations+for+Filament&md=1&showWatermark=0&fontSize=100px&images=https%3A%2F%2Flaravel.com%2Fimg%2Flogomark.min.svg" class="filament-hidden">
</p>

[![Latest Version on Packagist](https://img.shields.io/packagist/v/marcogermani87/filament-captcha.svg?style=flat-square)](https://packagist.org/packages/marcogermani87/filament-captcha)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/marcogermani87/filament-captcha/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/marcogermani87/filament-captcha/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/marcogermani87/filament-captcha/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/:vendor_slug/filament-captcha/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/marcogermani87/filament-captcha.svg?style=flat-square)](https://packagist.org/packages/marcogermani87/filament-captcha)

A package to easily include captcha field into [Filament](https://filamentphp.com) forms.

This plugin is based on [Gregwar/Captcha](https://github.com/Gregwar/Captcha) package.

## Version Compatibility

| Plugin | Filament | Laravel | PHP |
|--------|----------| ------------- | -------------|
| 1.x    | 3.x      | 10.x | 8.x |
| 1.x    | 3.x      | 11.x \| 12.x | 8.2 \| 8.3 \| 8.4 |
| 2.x    | 4.x \| 5.x     | 11.x \| 12.x | 8.2 \| 8.3 \| 8.4 |

## Installation

You can install the package via composer:

```bash
composer require marcogermani87/filament-captcha
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="filament-captcha-config"
```

This is the contents of the published config file:

```php
<?php

use Filament\Support\Enums\Size;

return [

    // optional, default is 5
    // 'length' => 4,

    // optional, default is 'abcdefghijklmnpqrstuvwxyz123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'
    // 'charset' => '123456789',

    'width' => 180,

    'height' => 50,

    'background_color' => [255, 255, 255],

    'refresh_button' => [
        'icon' => 'heroicon-o-arrow-path',
        'size' => Size::Medium,
    ]

];
```

## Usage

Register the plugin through your panel service provider:

```php
->plugin(\MarcoGermani87\FilamentCaptcha\FilamentCaptcha::make())
```

You can include the captcha field like any other filament field.

```php
<?php

use MarcoGermani87\FilamentCookieConsent\Components\CaptchaField;

public function form(Schema $schema): Schema
{
    return $schema
        ->components([
            ...
            CaptchaField::make('captcha'),
        ]);
}
```

## Screenshots

<img src="https://raw.githubusercontent.com/marcogermani87/filament-captcha/2.0.0/screenshots/filament_captcha_light.png" style="border-radius:2%"/>

<img src="https://raw.githubusercontent.com/marcogermani87/filament-captcha/2.0.0/screenshots/filament_captcha_dark.png" style="border-radius:2%"/>

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Credits

- [Marco Germani](https://github.com/marcogermani87)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
