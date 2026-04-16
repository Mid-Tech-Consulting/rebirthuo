<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

new
#[Title('Dashboard')]
#[Layout('layouts.public', ['title' => 'Dashboard - Rebirth'])]
class extends Component
{
    public function with(): array
    {
        return app(DashboardController::class)->index(Auth::user());
    }
}; ?>

<div class="min-h-screen py-20">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        {{-- Welcome Header --}}
        <div class="mb-8 flex flex-wrap items-center justify-between gap-4">
            <div>
                <h1 class="font-cinzel text-3xl font-bold text-zinc-100">Welcome, {{ auth()->user()->name }}</h1>
                <p class="mt-1 text-zinc-400">Manage your account and view your donation history.</p>
            </div>
            <div class="flex gap-3">
                <a href="{{ route('donate') }}"
                   class="rounded-lg bg-amber-600 px-6 py-2.5 text-sm font-semibold text-white transition hover:bg-amber-500"
                   wire:navigate>
                    Donate
                </a>
                <a href="{{ route('profile.edit') }}"
                   class="rounded-lg border border-zinc-700 bg-zinc-800 px-6 py-2.5 text-sm font-semibold text-zinc-300 transition hover:border-zinc-600"
                   wire:navigate>
                    Settings
                </a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                            class="rounded-lg border border-zinc-700 bg-zinc-800 px-6 py-2.5 text-sm font-semibold text-zinc-300 transition hover:border-zinc-600">
                        Log out
                    </button>
                </form>
            </div>
        </div>

        {{-- Stats Cards --}}
        <div class="mb-8 grid gap-6 sm:grid-cols-3">
            <div class="rounded-xl border border-zinc-800 bg-zinc-900/50 p-6">
                <p class="text-sm text-zinc-400">Total Donated</p>
                <p class="mt-1 text-3xl font-bold text-zinc-100">${{ number_format($total_donated) }}</p>
            </div>
            <div class="rounded-xl border border-zinc-800 bg-zinc-900/50 p-6">
                <p class="text-sm text-zinc-400">Sovereigns Earned</p>
                <p class="mt-1 text-3xl font-bold text-amber-500">{{ number_format($total_sovereigns) }}</p>
            </div>
            <div class="rounded-xl border border-zinc-800 bg-zinc-900/50 p-6">
                <p class="text-sm text-zinc-400">Pending Sovereigns</p>
                <p class="mt-1 text-3xl font-bold text-yellow-500">{{ number_format($pending_sovereigns) }}</p>
            </div>
        </div>

        {{-- Donation History --}}
        <div class="rounded-xl border border-zinc-800 bg-zinc-900/50 p-8">
            <h2 class="mb-4 font-cinzel text-xl font-bold text-zinc-100">Donation History</h2>

            @if ($donations->isEmpty())
                <p class="text-zinc-500">You haven't made any donations yet.</p>
            @else
                <div class="overflow-x-auto">
                    <table class="w-full text-left text-sm">
                        <thead class="border-b border-zinc-700 text-zinc-400">
                            <tr>
                                <th class="pb-3 pr-4">Date</th>
                                <th class="pb-3 pr-4">Account</th>
                                <th class="pb-3 pr-4">Amount</th>
                                <th class="pb-3 pr-4">Sovereigns</th>
                                <th class="pb-3">Status</th>
                            </tr>
                        </thead>
                        <tbody class="text-zinc-300">
                            @foreach ($donations as $donation)
                                <tr class="border-b border-zinc-800">
                                    <td class="py-3 pr-4">{{ $donation->created_at->format('M d, Y') }}</td>
                                    <td class="py-3 pr-4">{{ $donation->account_name }}</td>
                                    <td class="py-3 pr-4">${{ number_format($donation->amount) }}</td>
                                    <td class="py-3 pr-4 text-amber-500">{{ number_format($donation->sovereigns) }}</td>
                                    <td class="py-3">
                                        @if ($donation->is_completed)
                                            <span class="rounded-full bg-green-900/50 px-2 py-1 text-xs text-green-400">Completed</span>
                                        @else
                                            <span class="rounded-full bg-yellow-900/50 px-2 py-1 text-xs text-yellow-400">Pending</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
</div>
