<?php

namespace App\Services;

use Google\Client;
use App\Dto\VideoInfoDto;
use Google\Service\YouTube;

class YoutubeCollectorService
{
    public function getVideoInfo(string $videoId): VideoInfoDto
    {
        $client = new Client();
        $client->setApplicationName("Client_Library_Examples");
        $client->setDeveloperKey(config('youtube.key'));

        $service = new YouTube($client);
        $results = $service->videos->listVideos(['snippet', 'contentDetails'], [
            'id' => $videoId,
        ]);

        $item = $results->getItems()[0];

        return new VideoInfoDto(
            $item->getSnippet()->getTitle(),
            $item->getSnippet()->getDescription(),
            $item->getSnippet()->getThumbnails()->getHigh()->getUrl(),
        );
    }
}
