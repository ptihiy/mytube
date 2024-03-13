<?php

use Illuminate\Support\Facades\Http;

class YoutubeService
{
    private $baseUrl;

    public function __construct()
    {
        $this->baseUrl = 'https://www.googleapis.com/youtube/v3';
    }

    public function getVideoCategories()
    {
        return Http::get(`$this->baseUrl/videoCategories`);
    }
}
