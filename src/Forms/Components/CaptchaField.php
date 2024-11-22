<?php

namespace MarcoGermani87\FilamentCaptcha\Forms\Components;

use Filament\Forms\Components\Field;
use Gregwar\Captcha\CaptchaBuilder;
use Illuminate\Contracts\View\View;
use MarcoGermani87\FilamentCaptcha\Rules\Captcha;

class CaptchaField extends Field
{
    public string $image = '';

    protected CaptchaBuilder $captcha;

    protected string $view = 'filament-captcha::forms.components.captcha-field';

    protected function setUp(): void
    {
        parent::setUp();

        $this->captcha = new CaptchaBuilder;

        $this->rules([new Captcha])
            ->dehydrated(false)
            ->required()
            ->validationMessages([
                'required' => __('filament-captcha::filament-captcha.captcha_required'),
            ])
        ;
    }

    public function render(): View
    {
        $this->image = $this->getImage();

        return parent::render();
    }

    public function refreshImage(): void
    {
        $this->image = $this->getImage();
    }

    protected function getImage(): string
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
