<?php

namespace MarcoGermani87\FilamentCaptcha\Forms\Components;

use Gregwar\Captcha\CaptchaBuilder;
use Filament\Forms\Components\Field;
use MarcoGermani87\FilamentCaptcha\Rules\Captcha;

class CaptchaField extends Field
{
    protected CaptchaBuilder $captcha;

    protected string $view = 'filament-captcha::forms.components.captcha-field';

    protected function setUp(): void
    {
        parent::setUp();

        $this->captcha = new CaptchaBuilder;

        $this->rules([new Captcha])
            ->required();
    }

    public function getImage()
    {
        session(['filament_captcha_code' => $this->captcha->getPhrase()]);

        $backgroundColor = config('filament-captcha.background_color');

        return $this->captcha
            ->setBackgroundColor(
                $backgroundColor[0] ?? 255,
                $backgroundColor[1] ?? 255,
                $backgroundColor[2] ?? 255
            )
            ->build(
                config('filament-captcha.width') ?? 150,
                config('filament-captcha.height') ?? 40
            )->inline();
    }
}
