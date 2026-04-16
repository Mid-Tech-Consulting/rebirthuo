<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\DashboardService;

class DashboardController extends Controller
{
    public function __construct(
        private DashboardService $dashboardService,
    ) {}

    public function index(User $user): array
    {
        return $this->dashboardService->getDonationStats($user);
    }
}
