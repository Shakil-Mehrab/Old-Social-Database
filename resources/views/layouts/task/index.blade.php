<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Task') }}
        </h2>
    </x-slot>
    <main>
        <div>
            <div class="py-10 mx-auto max-w-7xl sm:px-6 lg:px-8 space-y-2 sm:space-y-0">
                @livewire('task.task-create-form')
                <x-jet-section-border />
                @livewire('task.task-list')
            </div>
        </div>
    </main>
</x-app-layout>
