<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\ProfileService;

class ProfileController extends Controller
{
    public function __construct(
        private ProfileService $profileService,
    ) {}

    public function update(User $user, array $validated): User
    {
        return $this->profileService->update($user, $validated);
    }

    public function sendVerificationNotification(User $user): void
    {
        $this->profileService->sendVerificationNotification($user);
    }
}
