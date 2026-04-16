<?php

use App\Http\Controllers\VideoController;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Component;

new
#[Layout('layouts.public', ['title' => 'Videos - Rebirth'])]
class extends Component
{
    #[Validate('required|string|max:255')]
    public string $title = '';

    #[Validate('required|url|max:500')]
    public string $url = '';

    #[Validate('required|in:pvp,pvm,event')]
    public string $category = 'pvp';

    public function submit(): void
    {
        $this->validate();

        app(VideoController::class)->store($this->title, $this->url, $this->category);

        $this->reset('title', 'url', 'category');
    }

    public function with(): array
    {
        return [
            'videos' => app(VideoController::class)->index(),
        ];
    }
}; ?>

<div class="py-20">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <h1 class="mb-8 text-center font-cinzel text-4xl font-bold text-zinc-100">Gameplay Videos</h1>

        {{-- Submit Form --}}
        <div class="mx-auto mb-16 max-w-xl rounded-xl border border-zinc-800 bg-zinc-900/50 p-6 shadow-xl">
            <h2 class="mb-4 font-cinzel text-xl font-bold text-zinc-100">Share Your Video</h2>

            @if (session('success'))
                <div class="mb-4 rounded-lg border border-green-800 bg-green-900/30 p-3">
                    <p class="text-sm font-semibold text-green-400">{{ session('success') }}</p>
                </div>
            @endif

            <form wire:submit="submit" class="flex flex-col gap-4">
                <div class="grid gap-2">
                    <label for="title" class="text-sm font-medium text-zinc-300">Title</label>
                    <input wire:model="title" type="text" id="title" placeholder="My epic PvP kill"
                           class="rounded-lg border border-zinc-700 bg-zinc-800 px-4 py-2.5 text-zinc-100 placeholder-zinc-500 transition focus:border-amber-600 focus:outline-none focus:ring-2 focus:ring-amber-600/50">
                    @error('title') <p class="text-sm text-red-400">{{ $message }}</p> @enderror
                </div>

                <div class="grid gap-2">
                    <label for="url" class="text-sm font-medium text-zinc-300">Video URL</label>
                    <input wire:model="url" type="url" id="url" placeholder="https://youtube.com/watch?v=..."
                           class="rounded-lg border border-zinc-700 bg-zinc-800 px-4 py-2.5 text-zinc-100 placeholder-zinc-500 transition focus:border-amber-600 focus:outline-none focus:ring-2 focus:ring-amber-600/50">
                    @error('url') <p class="text-sm text-red-400">{{ $message }}</p> @enderror
                </div>

                <div class="grid gap-2">
                    <label for="category" class="text-sm font-medium text-zinc-300">Category</label>
                    <select wire:model="category" id="category"
                            class="rounded-lg border border-zinc-700 bg-zinc-800 px-4 py-2.5 text-zinc-100 transition focus:border-amber-600 focus:outline-none focus:ring-2 focus:ring-amber-600/50">
                        <option value="pvp">PvP</option>
                        <option value="pvm">PvM</option>
                        <option value="event">Event</option>
                    </select>
                    @error('category') <p class="text-sm text-red-400">{{ $message }}</p> @enderror
                </div>

                <button type="submit"
                        class="rounded-lg bg-amber-600 px-6 py-2.5 font-semibold text-white shadow-lg shadow-amber-600/25 transition hover:bg-amber-500 disabled:opacity-50"
                        wire:loading.attr="disabled">
                    <span wire:loading.remove>Submit Video</span>
                    <span wire:loading>Submitting...</span>
                </button>
            </form>
        </div>

        {{-- Video Categories --}}
        @foreach (['pvp' => 'PvP', 'pvm' => 'PvM', 'event' => 'Events'] as $key => $label)
            <section class="mb-16">
                <h2 class="mb-6 font-cinzel text-2xl font-bold text-amber-500">{{ $label }}</h2>

                @if ($videos[$key]->isEmpty())
                    <p class="text-zinc-500">No {{ $label }} videos yet. Be the first to share one!</p>
                @else
                    <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 1.5rem;">
                        @foreach ($videos[$key] as $video)
                            <div class="rounded-xl border border-zinc-800 bg-zinc-900/50 overflow-hidden transition hover:border-amber-600/50">
                                @php
                                    $embedUrl = '';
                                    if (preg_match('/(?:youtube\.com\/watch\?v=|youtu\.be\/)([a-zA-Z0-9_-]+)/', $video->url, $matches)) {
                                        $embedUrl = 'https://www.youtube.com/embed/' . $matches[1];
                                    }
                                @endphp

                                @if ($embedUrl)
                                    <div style="position: relative; padding-bottom: 56.25%; height: 0;">
                                        <iframe src="{{ $embedUrl }}" frameborder="0" allowfullscreen
                                                style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;"></iframe>
                                    </div>
                                @else
                                    <a href="{{ $video->url }}" target="_blank" rel="noopener noreferrer"
                                       class="flex items-center justify-center bg-zinc-800 p-8 text-amber-500 transition hover:text-amber-400">
                                        <svg class="size-12" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M5.25 5.653c0-.856.917-1.398 1.667-.986l11.54 6.347a1.125 1.125 0 0 1 0 1.972l-11.54 6.347a1.125 1.125 0 0 1-1.667-.986V5.653Z"/>
                                        </svg>
                                    </a>
                                @endif

                                <div class="p-4">
                                    <h3 class="font-semibold text-zinc-100">{{ $video->title }}</h3>
                                    <p class="mt-1 text-xs text-zinc-500">{{ $video->created_at->diffForHumans() }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </section>
        @endforeach
    </div>
</div>
