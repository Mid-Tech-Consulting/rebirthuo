<?php

use App\Http\Controllers\RewardController;
use Livewire\Attributes\Layout;
use Livewire\Component;

new
#[Layout('layouts.public', ['title' => 'Donation Rewards - Rebirth'])]
class extends Component
{
    public function with(): array
    {
        return [
            'rewards' => app(RewardController::class)->index(),
        ];
    }
}; ?>

<div class="py-20">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="mb-12 text-center">
            <h1 class="mb-4 font-cinzel text-4xl font-bold text-zinc-100 sm:text-5xl">Donation Rewards</h1>
            <p class="mx-auto max-w-2xl text-lg text-zinc-400">
                Spend your Sovereigns on exclusive in-game items. Every <span class="font-semibold text-amber-500">$1 donated = 100 Sovereigns</span>.
            </p>
            <a href="{{ route('donate') }}"
               class="mt-6 inline-block rounded-lg bg-amber-600 px-6 py-3 font-semibold text-white shadow-lg shadow-amber-600/25 transition hover:bg-amber-500"
               wire:navigate>
                Donate Now
            </a>
        </div>

        @foreach (['featured' => 'Featured', 'mounts' => 'Mounts', 'character' => 'Character', 'equipment' => 'Equipment', 'decorations' => 'Decorations', 'misc' => 'Miscellaneous'] as $key => $label)
            @if ($rewards[$key]->isNotEmpty())
                <section class="mb-16">
                    <h2 class="mb-6 font-cinzel text-2xl font-bold text-amber-500">{{ $label }}</h2>

                    <div style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 1.5rem;">
                        @foreach ($rewards[$key] as $reward)
                            <div class="rounded-xl border border-zinc-800 bg-zinc-900/50 p-5 transition hover:border-amber-600/50">
                                {{-- Image or placeholder --}}
                                <div class="mb-4 flex aspect-square w-full items-center justify-center rounded-lg border border-zinc-800 bg-zinc-900">
                                    @if ($reward->image_url)
                                        <img src="{{ $reward->image_url }}" alt="{{ $reward->name }}" class="max-h-full max-w-full object-contain">
                                    @else
                                        <svg class="size-16 text-amber-600/40" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0"/>
                                        </svg>
                                    @endif
                                </div>

                                <h3 class="mb-1 font-cinzel text-sm font-bold text-zinc-100">{{ $reward->name }}</h3>
                                <p class="mb-3 text-xs text-zinc-400">{{ $reward->description }}</p>

                                <div class="flex items-center justify-between border-t border-zinc-800 pt-3">
                                    <span class="text-xs text-zinc-500">{{ $reward->item_id }}</span>
                                    <span class="font-semibold text-amber-500">{{ number_format($reward->cost) }} <span class="text-xs font-normal text-zinc-500">Sovs</span></span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </section>
            @endif
        @endforeach

        <div class="mt-16 rounded-xl border border-zinc-800 bg-zinc-900/30 p-6 text-center">
            <p class="text-zinc-400">
                This is a selection of popular rewards. The full in-game store offers many more items including pigments, hair dyes, decorations, and monthly exclusives.
            </p>
        </div>
    </div>
</div>
