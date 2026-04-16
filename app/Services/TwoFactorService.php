<?php

namespace App\Services;

use App\Models\User;
use Laravel\Fortify\Actions\ConfirmTwoFactorAuthentication;
use Laravel\Fortify\Actions\EnableTwoFactorAuthentication;
use Laravel\Fortify\Actions\GenerateNewRecoveryCodes;

class TwoFactorService
{
    public function __construct(
        private EnableTwoFactorAuthentication $enableTwoFactor,
        private ConfirmTwoFactorAuthentication $confirmTwoFactor,
        private GenerateNewRecoveryCodes $generateRecoveryCodes,
    ) {}

    public function enable(User $user): void
    {
        ($this->enableTwoFactor)($user);
    }

    public function confirm(User $user, string $code): void
    {
        ($this->confirmTwoFactor)($user, $code);
    }

    public function regenerateRecoveryCodes(User $user): void
    {
        ($this->generateRecoveryCodes)($user);
    }

    public function getSetupData(User $user): array
    {
        $user = $user->fresh();

        if (! $user || ! $user->two_factor_secret) {
            throw new \RuntimeException('Two-factor setup secret is not available.');
        }

        return [
            'qr_code_svg' => $user->twoFactorQrCodeSvg(),
            'setup_key' => decrypt($user->two_factor_secret),
        ];
    }

    public function getRecoveryCodes(User $user): array
    {
        if (! $user->hasEnabledTwoFactorAuthentication() || ! $user->two_factor_recovery_codes) {
            return [];
        }

        return json_decode(decrypt($user->two_factor_recovery_codes), true);
    }
}
