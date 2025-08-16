<?php

namespace MarcoGermani87\FilamentCaptcha\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class Captcha implements ValidationRule
{
    /**
     * Run the validation rule.
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $length = config('filament-captcha.length', 5);

        if (strlen($value) !== $length) {
            $fail(
                __('filament-captcha::filament-captcha.captcha_length_invalid', [
                    'length' => $length
                ])
            );
        }

        if ($value !== session('filament_captcha_code')) {
            $fail(__('filament-captcha::filament-captcha.captcha_invalid'));
        }
    }
}
