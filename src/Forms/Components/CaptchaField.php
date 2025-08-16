<?php

namespace MarcoGermani87\FilamentCaptcha\Forms\Components;

use Filament\Actions\Action;
use Filament\Forms\Components\Field;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Gregwar\Captcha\CaptchaBuilder;
use Gregwar\Captcha\PhraseBuilder;
use Illuminate\Contracts\View\View;
use MarcoGermani87\FilamentCaptcha\Rules\Captcha;

class CaptchaField extends TextInput
{
//    use InteractsWithForms;

    public string $image = '';

    protected CaptchaBuilder $captcha;

    protected string $view = 'filament-captcha::forms.components.captcha-field';

    protected function setUp(): void
    {
        $charset = config('filament-captcha.charset', 'abcdefghijklmnpqrstuvwxyz123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ');

        $phraseBuilder = new PhraseBuilder(config('filament-captcha.length', 5), $charset);

        $this->captcha = new CaptchaBuilder(null, $phraseBuilder);

        $this->rules([new Captcha])
            ->dehydrated(false)
            ->required()
            ->validationMessages([
                'required' => __('filament-captcha::filament-captcha.captcha_required'),
            ])
            ->registerActions([
                Action::make('refreshImage')
                    ->hiddenLabel()
                    ->icon('heroicon-o-arrow-path')
                    ->action(function () {
                        $this->refreshImage();
                    })
                    ->button()
                    ->outlined()
                    ->size('sm'),
            ]);

        parent::setUp();
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

        $backgroundColor = config('filament-captcha.background_color', [
            255, 255, 255,
        ]);

        return $this->captcha
            ->setBackgroundColor(
                $backgroundColor[0] ?? 255,
                $backgroundColor[1] ?? 255,
                $backgroundColor[2] ?? 255
            )
            ->build(
                config('filament-captcha.width', 150),
                config('filament-captcha.height', 40)
            )->inline();
    }
}
