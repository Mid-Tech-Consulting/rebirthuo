<?php

namespace App\Services;

use App\Models\Reward;

class RewardService
{
    public function getByCategory(): array
    {
        $all = Reward::orderBy('display_order')->orderBy('cost')->get();

        return [
            'featured' => $all->where('category', 'featured')->values(),
            'mounts' => $all->where('category', 'mounts')->values(),
            'character' => $all->where('category', 'character')->values(),
            'equipment' => $all->where('category', 'equipment')->values(),
            'decorations' => $all->where('category', 'decorations')->values(),
            'misc' => $all->where('category', 'misc')->values(),
        ];
    }
}
