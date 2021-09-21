<x-jet-form-section submit="createTag">
    <x-slot name="title">
        {{ __('Create New Tag') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Example description') }}
    </x-slot>

    <x-slot name="form">
        <div class="col-span-8">
            <x-input-box label="Name" wire:model.lazy="state.name"></x-input-box>
            <x-jet-input-error for="name" class="mt-2" />
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-jet-action-message class="mr-3 text-green-600" on="saved">
            {{ __('Tag Added Successfully.') }}
        </x-jet-action-message>

        <x-jet-button>
            {{ __('Save') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>
