<?php

namespace MarcoGermani87\FilamentCaptcha\Tests;

use Illuminate\Database\Eloquent\Factories\Factory;
use MarcoGermani87\FilamentCaptcha\FilamentCaptchaServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();

        Factory::guessFactoryNamesUsing(
            fn (string $modelName) => 'MarcoGermani87\\FilamentCaptcha\\Database\\Factories\\'.class_basename($modelName).'Factory'
        );
    }

    protected function getPackageProviders($app)
    {
        return [
            FilamentCaptchaServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        config()->set('database.default', 'testing');

        /*
        $migration = include __DIR__.'/../database/migrations/create_filament-captcha_table.php.stub';
        $migration->up();
        */
    }
}
