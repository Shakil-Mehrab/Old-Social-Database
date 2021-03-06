@props([
    'multiple' => false,
])

<div class="flex w-full" wire:ignore id="select2Search">
    <select {{ $multiple ? 'multiple' : '' }}
        {{ $attributes->merge(['class' => 'select2 form-select block w-full text-base leading-6 border-gray-300 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5']) }}>
        {{ $slot }}

    </select>
</div>

{{-- @push('scripts')
    <script>
        var newOne = "No Result Found"
        $(document).ready(function() {
            $('.select2').select2({
                width: '100%'

            }).on('change', function() {
                @this.set('state.area', $(this).val());
            });
        });
    </script>
@endpush --}}
