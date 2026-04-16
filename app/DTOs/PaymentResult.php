<?php

namespace App\DTOs;

class PaymentResult
{
    public function __construct(
        public readonly string $redirectUrl,
        public readonly string $sessionId,
    ) {}

    public static function redirect(string $url, string $sessionId): self
    {
        return new self($url, $sessionId);
    }
}
