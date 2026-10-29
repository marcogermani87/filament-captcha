<?php

use Filament\Actions\Concerns\InteractsWithActions;
use Filament\Actions\Contracts\HasActions;
use Filament\Schemas\Concerns\InteractsWithSchemas;
use Filament\Schemas\Contracts\HasSchemas;
use Filament\Schemas\Schema;
use Livewire\Component;
use Livewire\Livewire;
use MarcoGermani87\FilamentCaptcha\Forms\Components\CaptchaField;

class CaptchaFormComponent extends Component implements HasActions, HasSchemas
{
    use InteractsWithActions;
    use InteractsWithSchemas;

    public ?array $data = [];

    public function mount(): void
    {
        $this->form->fill();
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                CaptchaField::make('captcha'),
            ])
            ->statePath('data');
    }

    public function submit(): void
    {
        $this->form->getState();
    }

    public function render(): string
    {
        return <<<'HTML'
        <div>
            {{ $this->form }}
            <button type="button" wire:click="submit">Submit</button>
        </div>
        HTML;
    }
}

function submitCaptcha($component, ?string $code): mixed
{
    return $component->update(
        calls: [[
            'method' => 'submit',
            'params' => [],
            'path' => '',
        ]],
        updates: [
            'data.captcha' => $code,
        ],
    );
}

it('accepts the captcha on the first submit of a custom livewire form', function () {
    $component = Livewire::test(CaptchaFormComponent::class);

    $code = session('filament_captcha_code');

    submitCaptcha($component, $code)->assertHasNoErrors();
});

it('still accepts the original captcha after the form re-renders', function () {
    $component = Livewire::test(CaptchaFormComponent::class);

    $code = session('filament_captcha_code');

    $component->set('data.captcha', $code);

    expect(session('filament_captcha_code'))->toBe($code);

    $component->call('submit')->assertHasNoErrors();
});

it('rejects a wrong captcha and keeps the same code for another try', function () {
    $component = Livewire::test(CaptchaFormComponent::class);

    $code = session('filament_captcha_code');

    submitCaptcha($component, str_repeat('Z', strlen($code)))
        ->assertHasErrors(['data.captcha']);

    expect(session('filament_captcha_code'))->toBe($code);

    submitCaptcha($component, $code)->assertHasNoErrors();
});

it('accepts the new code after the captcha is refreshed', function () {
    $component = Livewire::test(CaptchaFormComponent::class);

    $original = session('filament_captcha_code');

    $component->call('mountAction', 'refreshImage', [], [
        'schemaComponent' => 'form.captcha',
    ]);

    $refreshed = session('filament_captcha_code');

    expect($refreshed)->not->toBe($original);

    submitCaptcha($component, $original)->assertHasErrors(['data.captcha']);

    submitCaptcha($component, $refreshed)->assertHasNoErrors();
});
