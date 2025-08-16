<x-dynamic-component
    :component="$getFieldWrapperView()"
    :field="$field"
>
    <div class="inline-flex space-x-2">
        <img wire:model="image" class="rounded border-solid border-2" src="{{ $field->image }}"/>
        {{ $getAction('refreshImage') }}
    </div>
    <x-filament::input.wrapper>
        <x-filament::input
            type="text"
            wire:model="{{ $getStatePath() }}"
        />
    </x-filament::input.wrapper>
</x-dynamic-component>
