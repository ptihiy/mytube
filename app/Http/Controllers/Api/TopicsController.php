<?php

namespace App\Http\Controllers\Api;

use YoutubeService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TopicsController extends Controller
{
    public function index(YoutubeService $ytService)
    {
        return $ytService->getVideoCategories();
    }
}
