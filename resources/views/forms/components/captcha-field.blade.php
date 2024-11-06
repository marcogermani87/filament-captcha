<x-dynamic-component
    :component="$getFieldWrapperView()"
    :field="$field"
>
    <div class="inline-flex space-x-2">
        <img wire:model="image" class="rounded border-solid border-2" src="{{ $field->image }}"/>
        <x-filament::link
            wire:click="mountFormComponentAction('{{ $getStatePath() }}', 'refreshImage');"
            tag="button"
        >
            <x-filament::icon
                wire:loading.remove
                wire:target="mountFormComponentAction('{{ $getStatePath() }}', 'refreshImage')"
                icon="heroicon-o-arrow-path"
                class="h-5 w-5"
            />
            <x-filament::loading-indicator
                wire:loading
                wire:target="mountFormComponentAction('{{ $getStatePath() }}', 'refreshImage')"
                class="ml-3 h-5 w-5"
            />
        </x-filament::link>
    </div>
    <x-filament::input.wrapper>
        <x-filament::input
            type="text"
            wire:model="{{ $getStatePath() }}"
        />
    </x-filament::input.wrapper>
</x-dynamic-component>
