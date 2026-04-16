<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\SecurityService;

class SecurityController extends Controller
{
    public function __construct(
        private SecurityService $securityService,
    ) {}

    public function updatePassword(User $user, string $password): void
    {
        $this->securityService->updatePassword($user, $password);
    }

    public function disableTwoFactor(User $user): void
    {
        $this->securityService->disableTwoFactor($user);
    }
}
