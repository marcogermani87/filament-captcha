<?php

namespace MarcoGermani87\FilamentCaptcha;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class FilamentCaptchaServiceProvider extends PackageServiceProvider
{
    public static string $name = 'filament-captcha';

    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('filament-captcha')
            ->hasConfigFile()
            ->hasTranslations()
            ->hasViews();
    }
}
