<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\UserDeletionService;

class UserDeletionController extends Controller
{
    public function __construct(
        private UserDeletionService $userDeletionService,
    ) {}

    public function destroy(User $user): void
    {
        $this->userDeletionService->delete($user);
    }
}
