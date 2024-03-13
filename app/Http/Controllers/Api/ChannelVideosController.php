<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Google\Client;
use Google\Service\YouTube;

class ChannelVideosController extends Controller
{
    public function latest($channelId)
    {
        $client = new Client();
        $client->setApplicationName("Client_Library_Examples");
        $client->setDeveloperKey(config('youtube.key'));

        $service = new YouTube($client);
        $results = $service->search->listSearch('snippet', [
            'channelId' => $channelId,
            'order' => 'date',
        ]);
        dd($results);
    }
}
