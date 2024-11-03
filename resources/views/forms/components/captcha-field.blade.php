<x-dynamic-component
    :component="$getFieldWrapperView()"
    :field="$field"
>
    <div class="inline-flex space-x-2">
        <img class="rounded border-solid border-2" src="{{ $field->getImage() }}"/>
        <x-filament::link
            icon="heroicon-o-arrow-path"
            wire:click="$refresh()"
            tag="button"
        />
    </div>
    <x-filament::input.wrapper>
        <x-filament::input
            type="text"
            wire:model="{{ $getStatePath() }}"
        />
    </x-filament::input.wrapper>
</x-dynamic-component>
