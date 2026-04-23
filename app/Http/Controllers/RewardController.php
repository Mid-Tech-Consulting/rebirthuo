<?php

namespace App\Http\Controllers;

use App\Services\RewardService;

class RewardController extends Controller
{
    public function __construct(
        private RewardService $rewardService,
    ) {}

    public function index(): array
    {
        return $this->rewardService->getByCategory();
    }
}
