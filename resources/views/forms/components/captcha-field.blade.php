<x-dynamic-component
    :component="$getFieldWrapperView()"
    :field="$field"
>
    <div class="inline-flex items-center space-x-2">
        <img wire:model="image" class="rounded border-2 border-gray-200 dark:border-gray-700 w-10 h-10 object-cover" alt="Captcha" src="{{ $field->image }}"/>
        {{ $getAction('refreshImage') }}
    </div>
    <x-filament::input.wrapper>
        <x-filament::input
            type="text"
            wire:model="{{ $getStatePath() }}"
        />
    </x-filament::input.wrapper>
</x-dynamic-component>
