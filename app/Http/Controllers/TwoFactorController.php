<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\TwoFactorService;

class TwoFactorController extends Controller
{
    public function __construct(
        private TwoFactorService $twoFactorService,
    ) {}

    public function enable(User $user): void
    {
        $this->twoFactorService->enable($user);
    }

    public function confirm(User $user, string $code): void
    {
        $this->twoFactorService->confirm($user, $code);
    }

    public function getSetupData(User $user): array
    {
        return $this->twoFactorService->getSetupData($user);
    }

    public function getRecoveryCodes(User $user): array
    {
        return $this->twoFactorService->getRecoveryCodes($user);
    }

    public function regenerateRecoveryCodes(User $user): void
    {
        $this->twoFactorService->regenerateRecoveryCodes($user);
    }
}
