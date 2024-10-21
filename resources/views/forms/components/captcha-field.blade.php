<x-dynamic-component
    :component="$getFieldWrapperView()"
    :field="$field"
>
    <img class="rounded border-solid border-2" src="{{ $field->getImage() }}"/>
    <x-filament::input.wrapper>
        <x-filament::input
            type="text"
            wire:model="{{ $getStatePath() }}"
        />
    </x-filament::input.wrapper>
</x-dynamic-component>
