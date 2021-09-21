<div>
    <div class="justify-between p-4 bg-white border-t border-gray-200 sm:flex group">
        <div class="flex flex-wrap items-center justify-between w-full space-x-2">
            <div class="my-2">
                <x-jet-input type="checkbox" />
            </div>
            <div class="flex-grow w-full md:w-4/12">
                <h2 class="text-base font-semibold leading-none text-gray-700">
                    {{ $type->name }}
                </h2>
                <div class="flex items-center">
                    <div class="text-sm text-gray-500">
                        {{ $type->slug }}
                    </div>
                </div>
                <div class="flex items-center mt-1">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        class="w-4 h-4 mr-1 text-gray-500">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <div class="text-sm text-gray-500">
                        {{ $type->created_at->toDayDateTimeString() }}
                    </div>
                </div>
            </div>
            <div class="my-2" style="margin-left:auto">
                <div class="transition-opacity duration-200 opacity-100 md:opacity-0 group-hover:opacity-100">
                    <div>
                        <x-jet-secondary-button wire:click.prevent="$set('showingTypeEditModal', {{ $type->id }})">
                            {{ _('Edit') }}
                        </x-jet-secondary-button>
                        <x-jet-danger-button wire:click.prevent="$set('showingTypeDeleteModal', {{ $type->id }})">
                            {{ _('Delete') }}
                        </x-jet-danger-button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <x-jet-dialog-modal wire:model="showingTypeEditModal">
        <x-slot name="title">
            {{ __('Edit Type') }}
        </x-slot>

        <x-slot name="content">
            <div class="mt-2">
                <x-input-box wire:model.lazy="state.name" label="Name"></x-input-box>
                <x-jet-input-error for="name"></x-jet-input-error>
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('showingTypeEditModal', null)" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>

            <x-jet-button class="ml-2" wire:click="updateType" wire:loading.attr="disabled">
                {{ __('Save') }}
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>

    <x-jet-dialog-modal wire:model="showingTypeDeleteModal">
        <x-slot name="title">
            {{ __('Delete Type') }}
        </x-slot>
        <x-slot name="content">
            Are you sure to delete
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('showingTypeDeleteModal', null)" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>
            <x-jet-danger-button class="ml-2" wire:click="deleteType" wire:loading.attr="disabled">
                {{ __('Delete') }}
            </x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
