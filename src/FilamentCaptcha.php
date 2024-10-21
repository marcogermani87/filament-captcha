<?php

namespace MarcoGermani87\FilamentCaptcha;

use Filament\Panel;

class FilamentCaptcha
{
    public function getId(): string
    {
        return FilamentCaptchaServiceProvider::$name;
    }

    public function boot(Panel $panel): void
    {

    }

    public static function make(): static
    {
        return app(static::class);
    }
}
