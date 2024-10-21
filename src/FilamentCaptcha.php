<?php

namespace MarcoGermani87\FilamentCaptcha;

use Filament\Panel;
use Filament\Contracts\Plugin;

class FilamentCaptcha implements Plugin
{
    public function getId(): string
    {
        return FilamentCaptchaServiceProvider::$name;
    }

    public function register(Panel $panel): void {}

    public function boot(Panel $panel): void {}

    public static function make(): static
    {
        return app(static::class);
    }
}
