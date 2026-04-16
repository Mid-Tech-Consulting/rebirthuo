@props([
    'sidebar' => false,
])

@if($sidebar)
    <flux:sidebar.brand name="Rebirth" {{ $attributes }}>
        <x-slot name="logo" class="flex aspect-square size-8 items-center justify-center rounded-md bg-amber-600 text-white">
            <span class="text-sm font-bold">R</span>
        </x-slot>
    </flux:sidebar.brand>
@else
    <flux:brand name="Rebirth" {{ $attributes }}>
        <x-slot name="logo" class="flex aspect-square size-8 items-center justify-center rounded-md bg-amber-600 text-white">
            <span class="text-sm font-bold">R</span>
        </x-slot>
    </flux:brand>
@endif
