<?php

namespace App\Services;

use App\Models\Video;
use Illuminate\Support\Collection;

class VideoService
{
    public function getRecentByCategory(): array
    {
        return [
            'pvp' => Video::where('category', 'pvp')->latest()->take(15)->get(),
            'pvm' => Video::where('category', 'pvm')->latest()->take(15)->get(),
            'event' => Video::where('category', 'event')->latest()->take(15)->get(),
        ];
    }

    public function store(string $title, string $url, string $category): Video
    {
        return Video::create([
            'title' => $title,
            'url' => $url,
            'category' => $category,
        ]);
    }
}
