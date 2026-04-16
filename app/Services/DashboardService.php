<?php

namespace App\Services;

use App\Models\User;

class DashboardService
{
    public function getDonationStats(User $user): array
    {
        $donations = $user->donations;

        return [
            'donations' => $donations->sortByDesc('created_at'),
            'total_donated' => $donations->sum('amount'),
            'total_sovereigns' => $donations->where('is_completed', true)->sum('sovereigns'),
            'pending_sovereigns' => $donations->where('is_completed', false)->sum('sovereigns'),
        ];
    }
}
