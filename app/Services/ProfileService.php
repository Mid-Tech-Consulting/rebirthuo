<?php

namespace App\Services;

use App\Models\User;

class ProfileService
{
    public function update(User $user, array $validated): User
    {
        $user->fill($validated);

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $user->save();

        return $user;
    }

    public function sendVerificationNotification(User $user): void
    {
        $user->sendEmailVerificationNotification();
    }
}
