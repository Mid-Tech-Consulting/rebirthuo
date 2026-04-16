<?php

use App\Http\Controllers\DonationController;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Component;

new
#[Layout('layouts.public', ['title' => 'Donate - Rebirth'])]
class extends Component
{
    #[Validate('required|string|max:255')]
    public string $account_name = '';

    #[Validate('required|integer|min:1')]
    public ?int $amount = 10;

    public function donate(): void
    {
        $this->validate();

        $result = app(DonationController::class)->store(
            $this->account_name,
            $this->amount,
        );

        $this->redirect($result->redirectUrl);
    }

    public function with(): array
    {
        return [
            'calculated_sovereigns' => app(DonationController::class)->calculateSovereigns(max(0, (int) $this->amount)),
        ];
    }
}; ?>

<div class="py-20">
    <div class="mx-auto max-w-2xl px-4 sm:px-6 lg:px-8">
        <div class="rounded-xl border border-zinc-800 bg-zinc-900/50 p-8 shadow-xl">
            <h1 class="mb-2 font-cinzel text-3xl font-bold text-zinc-100">Donate</h1>
            <p class="mb-8 text-zinc-400">
                Support Rebirth and earn Sovereigns. Every <span class="text-amber-500">$1 = 100 Sovereigns</span>.
            </p>

            @if (session('success'))
                <div class="mb-6 rounded-lg border border-green-800 bg-green-900/30 p-4">
                    <p class="font-semibold text-green-400">{{ session('success') }}</p>
                </div>
            @endif

            @if (session('error'))
                <div class="mb-6 rounded-lg border border-red-800 bg-red-900/30 p-4">
                    <p class="font-semibold text-red-400">{{ session('error') }}</p>
                </div>
            @endif

            <form wire:submit="donate" class="flex flex-col gap-6">
                {{-- Account Name --}}
                <div class="grid gap-2">
                    <label for="account_name" class="text-sm font-medium text-zinc-300">
                        In-Game Account Name
                    </label>
                    <input
                        wire:model="account_name"
                        type="text"
                        id="account_name"
                        placeholder="Your UO account name"
                        required
                        class="rounded-lg border border-zinc-700 bg-zinc-800 px-4 py-2.5 text-zinc-100 placeholder-zinc-500 transition focus:border-amber-600 focus:outline-none focus:ring-2 focus:ring-amber-600/50"
                    >
                    @error('account_name')
                        <p class="text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Donation Amount --}}
                <div class="grid gap-2">
                    <label for="amount" class="text-sm font-medium text-zinc-300">
                        Donation Amount (USD)
                    </label>
                    <input
                        wire:model.live="amount"
                        type="number"
                        id="amount"
                        min="1"
                        step="1"
                        required
                        class="rounded-lg border border-zinc-700 bg-zinc-800 px-4 py-2.5 text-zinc-100 placeholder-zinc-500 transition focus:border-amber-600 focus:outline-none focus:ring-2 focus:ring-amber-600/50"
                    >
                    @error('amount')
                        <p class="text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Sovereigns Preview --}}
                <div class="rounded-lg border border-amber-800/50 bg-amber-900/20 p-4">
                    <p class="text-sm text-zinc-400">You will receive:</p>
                    <p class="font-cinzel text-2xl font-bold text-amber-500">
                        {{ number_format($calculated_sovereigns) }} Sovereigns
                    </p>
                </div>

                {{-- Submit --}}
                <button
                    type="submit"
                    class="rounded-lg bg-amber-600 px-6 py-3 text-lg font-semibold text-white shadow-lg shadow-amber-600/25 transition hover:bg-amber-500 disabled:opacity-50"
                    wire:loading.attr="disabled"
                >
                    <span wire:loading.remove>Proceed to Payment</span>
                    <span wire:loading>Redirecting to Stripe...</span>
                </button>

                <p class="text-center text-xs text-zinc-500">
                    Payments are securely processed by Stripe. Supports credit cards, Google Pay, and Apple Pay.
                </p>
            </form>
        </div>
    </div>
</div>
