<?php

namespace MarcoGermani87\FilamentCaptcha\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \MarcoGermani87\FilamentCaptcha\FilamentCaptcha
 */
class FilamentCaptcha extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \MarcoGermani87\FilamentCaptcha\FilamentCaptcha::class;
    }
}
