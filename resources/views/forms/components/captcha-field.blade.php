<x-dynamic-component
    :component="$getFieldWrapperView()"
    :field="$field"
>
    <x-filament::input.wrapper>
        <x-filament::input
            type="text"
            wire:model="{{ $getStatePath() }}"
        />
    </x-filament::input.wrapper>
</x-dynamic-component>
