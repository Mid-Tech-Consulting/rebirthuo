<?php

namespace App\Http\Controllers;

use App\DTOs\PaymentResult;
use App\Services\DonationService;

class DonationController extends Controller
{
    public function __construct(
        private DonationService $donationService,
    ) {}

    public function store(string $accountName, int $amount): PaymentResult
    {
        return $this->donationService->initiateCheckout($accountName, $amount);
    }

    public function handleWebhook(string $payload, string $signature): bool
    {
        return $this->donationService->handleWebhook($payload, $signature);
    }

    public function calculateSovereigns(int $amount): int
    {
        return $this->donationService->calculateSovereigns($amount);
    }
}
