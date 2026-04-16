<?php

use App\Http\Controllers\StripeWebhookController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('home');

Route::livewire('donate', 'pages::donate.index')->name('donate');
Route::livewire('videos', 'pages::videos.index')->name('videos');

Route::get('donate/success', fn () => redirect()->route('donate')->with('success', 'Payment received! Your sovereigns will be delivered soon.'))
    ->name('donate.success');
Route::get('donate/cancel', fn () => redirect()->route('donate')->with('error', 'Payment was cancelled.'))
    ->name('donate.cancel');

Route::post('stripe/webhook', [StripeWebhookController::class, 'handle'])
    ->name('stripe.webhook');
