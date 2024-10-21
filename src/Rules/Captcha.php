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
        if ($value !== session('filament_captcha_code')) {
            $fail(__('messages.captcha_invalid'));
        }
    }
}
