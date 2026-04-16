<?php

namespace App\Services;

use App\Livewire\Actions\Logout;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserDeletionService
{
    public function __construct(
        private Logout $logout,
    ) {}

    public function delete(User $user): void
    {
        ($this->logout)();

        $user->delete();
    }
}
