<?php

namespace App\Contracts;

use App\DTOs\PaymentResult;

interface PaymentGatewayInterface
{
    /**
     * Create a checkout session for the given donation details.
     * No database record is created at this point.
     */
    public function createCheckoutSession(string $accountName, int $amount, int $sovereigns): PaymentResult;

    /**
     * Handle a webhook/callback from the payment provider.
     * This is where the Donation record gets created.
     */
    public function handleWebhook(string $payload, string $signature): bool;
}
