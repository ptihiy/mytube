<?php

namespace App\Http\Controllers\Api;

use App\Dto\VideoInfoDto;
use Google\Client;
use Google\Service\YouTube;
use App\Http\Controllers\Controller;

class TestController extends Controller
{
    public function index()
    {
        $client = new Client();
        $client->setApplicationName("Client_Library_Examples");
        $client->setDeveloperKey(config('youtube.key'));

        $service = new YouTube($client);
        $results = $service->channels->listChannels('snippet', [
            'id' => 'UCWV3obpZVGgJ3j9FVhEjF2Q',
        ]);
        dd($results->getItems()[0]->getSnippet()->getThumbnails()->getDefault());
    }

    public function playlists()
    {
        $client = new Client();
        $client->setApplicationName("Client_Library_Examples");
        $client->setDeveloperKey(config('youtube.key'));

        $service = new YouTube($client);
        $results = $service->playlists->listPlaylists(['snippet', 'contentDetails'], [
            'channelId' => 'UCsOcRkdDLKWq_KSkrQnkH5g',
        ]);
        dd($results->getItems());
    }

    public function video()
    {
        $client = new Client();
        $client->setApplicationName("Client_Library_Examples");
        $client->setDeveloperKey(config('youtube.key'));

        $service = new YouTube($client);
        $results = $service->videos->listVideos(['snippet', 'contentDetails'], [
            'id' => '2u-uDB6r48Y',
        ]);

        $item = $results->getItems()[0];

        dd($item);
    }
}
