<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class StripeWebhookController extends Controller
{
    public function handle(Request $request): Response
    {
        $success = app(DonationController::class)->handleWebhook(
            $request->getContent(),
            $request->header('Stripe-Signature', ''),
        );

        return response($success ? 'OK' : 'Invalid signature', $success ? 200 : 400);
    }
}
