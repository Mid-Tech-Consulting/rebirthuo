<?php

namespace App\Services;

use App\Models\User;
use Laravel\Fortify\Actions\DisableTwoFactorAuthentication;

class SecurityService
{
    public function __construct(
        private DisableTwoFactorAuthentication $disableTwoFactor,
    ) {}

    public function updatePassword(User $user, string $password): void
    {
        $user->update([
            'password' => $password,
        ]);
    }

    public function disableTwoFactor(User $user): void
    {
        ($this->disableTwoFactor)($user);
    }
}
