<x-layouts.public title="Rebirth - Ultima Online Free Server">
    {{-- Hero --}}
    <section class="flex flex-col items-center gap-4 px-4 py-12 text-center sm:py-16">
        <div class="w-full overflow-hidden" style="max-width: 700px; height: 350px;">
            <img src="{{ asset('images/rebirthimage.png') }}" alt="Ultima Online Rebirth"
                 style="width: 100%; height: 100%; object-fit: cover; object-position: center;">
        </div>

        <p class="max-w-2xl text-lg text-zinc-300 sm:text-xl">
            A new era of Ultima Online awaits. Join our free server and experience the classic adventure reborn.
        </p>
    </section>

    {{-- Features Section --}}
    <section class="mx-auto max-w-7xl px-4 py-20 sm:px-6 lg:px-8">
        <h2 class="mb-12 text-center font-cinzel text-3xl font-bold text-zinc-100 sm:text-4xl">
            Why Choose Rebirth?
        </h2>
        <div style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 2rem;">
            {{-- Feature 1 --}}
            <div class="rounded-xl border border-zinc-800 bg-zinc-900/50 p-8 transition hover:border-amber-600/50">
                <div class="mb-4 flex size-12 items-center justify-center rounded-lg bg-amber-600/10">
                    <svg class="size-6 text-amber-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 21a9.004 9.004 0 0 0 8.716-6.747M12 21a9.004 9.004 0 0 1-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 0 1 7.843 4.582M12 3a8.997 8.997 0 0 0-7.843 4.582m15.686 0A11.953 11.953 0 0 1 12 10.5c-2.998 0-5.74-1.1-7.843-2.918m15.686 0A8.959 8.959 0 0 1 21 12c0 .778-.099 1.533-.284 2.253m0 0A17.919 17.919 0 0 1 12 16.5c-3.162 0-6.133-.815-8.716-2.247m0 0A9.015 9.015 0 0 1 3 12c0-1.605.42-3.113 1.157-4.418"/>
                    </svg>
                </div>
                <h3 class="mb-2 font-cinzel text-xl font-bold text-zinc-100">Classic Experience</h3>
                <p class="text-zinc-400">Relive the golden age of Ultima Online with authentic gameplay, classic mechanics, and the world you remember.</p>
            </div>

            {{-- Feature 2 --}}
            <div class="rounded-xl border border-zinc-800 bg-zinc-900/50 p-8 transition hover:border-amber-600/50">
                <div class="mb-4 flex size-12 items-center justify-center rounded-lg bg-amber-600/10">
                    <svg class="size-6 text-amber-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z"/>
                    </svg>
                </div>
                <h3 class="mb-2 font-cinzel text-xl font-bold text-zinc-100">Active Community</h3>
                <p class="text-zinc-400">Join a thriving community of players. Team up for dungeons, trade at the bank, or engage in PvP battles.</p>
            </div>

            {{-- Feature 3 --}}
            <div class="rounded-xl border border-zinc-800 bg-zinc-900/50 p-8 transition hover:border-amber-600/50">
                <div class="mb-4 flex size-12 items-center justify-center rounded-lg bg-amber-600/10">
                    <svg class="size-6 text-amber-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9.813 15.904 9 18.75l-.813-2.846a4.5 4.5 0 0 0-3.09-3.09L2.25 12l2.846-.813a4.5 4.5 0 0 0 3.09-3.09L9 5.25l.813 2.846a4.5 4.5 0 0 0 3.09 3.09L15.75 12l-2.846.813a4.5 4.5 0 0 0-3.09 3.09ZM18.259 8.715 18 9.75l-.259-1.035a3.375 3.375 0 0 0-2.455-2.456L14.25 6l1.036-.259a3.375 3.375 0 0 0 2.455-2.456L18 2.25l.259 1.035a3.375 3.375 0 0 0 2.455 2.456L21.75 6l-1.036.259a3.375 3.375 0 0 0-2.455 2.456ZM16.894 20.567 16.5 21.75l-.394-1.183a2.25 2.25 0 0 0-1.423-1.423L13.5 18.75l1.183-.394a2.25 2.25 0 0 0 1.423-1.423l.394-1.183.394 1.183a2.25 2.25 0 0 0 1.423 1.423l1.183.394-1.183.394a2.25 2.25 0 0 0-1.423 1.423Z"/>
                    </svg>
                </div>
                <h3 class="mb-2 font-cinzel text-xl font-bold text-zinc-100">Free to Play</h3>
                <p class="text-zinc-400">Completely free to play. Optional donations earn you Sovereigns for in-game rewards to enhance your adventure.</p>
            </div>

            {{-- Feature 4 --}}
            <div class="rounded-xl border border-zinc-800 bg-zinc-900/50 p-8 transition hover:border-amber-600/50">
                <div class="mb-4 flex size-12 items-center justify-center rounded-lg bg-amber-600/10">
                    <svg class="size-6 text-amber-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.362 5.214A8.252 8.252 0 0 1 12 21 8.25 8.25 0 0 1 6.038 7.047 8.287 8.287 0 0 0 9 9.601a8.983 8.983 0 0 1 3.361-6.867 8.21 8.21 0 0 0 3 2.48Z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 18a3.75 3.75 0 0 0 .495-7.468 5.99 5.99 0 0 0-1.925 3.547 5.975 5.975 0 0 1-2.133-1.001A3.75 3.75 0 0 0 12 18Z"/>
                    </svg>
                </div>
                <h3 class="mb-2 font-cinzel text-xl font-bold text-zinc-100">Felucca Rules</h3>
                <p class="text-zinc-400">Full PvP everywhere — like Siege Perilous but with insurance. Raid any boss, spawn, or monster. Be ready to fight or be fought.</p>
            </div>
        </div>
    </section>

    {{-- Donation Info Section --}}
    <section class="border-t border-zinc-800/50 bg-zinc-900/30">
        <div class="mx-auto max-w-7xl px-4 py-20 sm:px-6 lg:px-8">
            <div class="mx-auto max-w-3xl text-center">
                <h2 class="mb-4 font-cinzel text-3xl font-bold text-zinc-100 sm:text-4xl">
                    Support the Server
                </h2>
                <p class="mb-8 text-lg text-zinc-400">
                    Help keep Rebirth running. Every $10 donated earns you <span class="font-semibold text-amber-500">1,000 Sovereigns</span> to spend on in-game rewards.
                </p>
                <a href="{{ route('donate') }}"
                   class="inline-block rounded-lg bg-amber-600 px-8 py-3 text-lg font-semibold text-white shadow-lg shadow-amber-600/25 transition hover:bg-amber-500"
                   wire:navigate>
                    Donate Now
                </a>
            </div>
        </div>
    </section>
</x-layouts.public>
