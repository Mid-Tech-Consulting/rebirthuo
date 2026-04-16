<?php

namespace App\Services\PaymentGateways;

use App\Contracts\PaymentGatewayInterface;
use App\DTOs\PaymentResult;
use App\Models\Donation;
use Stripe\Checkout\Session;
use Stripe\Exception\SignatureVerificationException;
use Stripe\StripeClient;
use Stripe\Webhook;

class StripePaymentGateway implements PaymentGatewayInterface
{
    private StripeClient $stripe;

    public function __construct()
    {
        $this->stripe = new StripeClient(config('stripe.secret'));
    }

    public function createCheckoutSession(string $accountName, int $amount, int $sovereigns): PaymentResult
    {
        $session = $this->stripe->checkout->sessions->create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'price_data' => [
                    'currency' => 'usd',
                    'product_data' => [
                        'name' => "Rebirth Donation - {$sovereigns} Sovereigns",
                        'description' => "Donation for account: {$accountName}",
                    ],
                    'unit_amount' => $amount * 100,
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => route('donate.success'),
            'cancel_url' => route('donate.cancel'),
            'metadata' => [
                'account_name' => $accountName,
                'amount' => $amount,
                'sovereigns' => $sovereigns,
            ],
        ]);

        return PaymentResult::redirect($session->url, $session->id);
    }

    public function handleWebhook(string $payload, string $signature): bool
    {
        $secret = config('stripe.webhook_secret');

        try {
            $event = Webhook::constructEvent($payload, $signature, $secret);
        } catch (SignatureVerificationException) {
            return false;
        }

        if ($event->type === 'checkout.session.completed') {
            $session = $event->data->object;
            $metadata = $session->metadata;

            Donation::create([
                'account_name' => $metadata->account_name,
                'amount' => $metadata->amount,
                'sovereigns' => $metadata->sovereigns,
                'payment_method' => 'stripe',
                'transaction_id' => $session->payment_intent,
                'is_completed' => false,
            ]);
        }

        return true;
    }
}
