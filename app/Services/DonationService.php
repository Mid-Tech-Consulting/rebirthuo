<?php

namespace App\Services;

use App\Contracts\PaymentGatewayInterface;
use App\DTOs\PaymentResult;

class DonationService
{
    public function __construct(
        private PaymentGatewayInterface $gateway,
    ) {}

    public function initiateCheckout(string $accountName, int $amount): PaymentResult
    {
        $sovereigns = $this->calculateSovereigns($amount);

        return $this->gateway->createCheckoutSession($accountName, $amount, $sovereigns);
    }

    public function handleWebhook(string $payload, string $signature): bool
    {
        return $this->gateway->handleWebhook($payload, $signature);
    }

    public function calculateSovereigns(int $amount): int
    {
        return $amount * 100;
    }
}
