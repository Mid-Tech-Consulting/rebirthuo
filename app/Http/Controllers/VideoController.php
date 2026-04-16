<?php

namespace App\Http\Controllers;

use App\Models\Video;
use App\Services\VideoService;

class VideoController extends Controller
{
    public function __construct(
        private VideoService $videoService,
    ) {}

    public function index(): array
    {
        return $this->videoService->getRecentByCategory();
    }

    public function store(string $title, string $url, string $category): Video
    {
        return $this->videoService->store($title, $url, $category);
    }
}
