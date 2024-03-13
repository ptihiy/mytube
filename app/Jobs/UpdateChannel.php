<?php

namespace App\Jobs;

use Log;
use Google\Client;
use App\Models\Channel;
use Google\Service\YouTube;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class UpdateChannel implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $deleteWhenMissingModels = true;

    /**
     * Create a new job instance.
     */
    public function __construct(
        public Channel $channel,
    ) {}

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $client = new Client();
        $client->setApplicationName("Client_Library_Examples");
        $client->setDeveloperKey(config('youtube.key'));

        $service = new YouTube($client);
        $results = $service->channels->listChannels('snippet', [
            'id' => $this->channel->y_id,
        ]);

        $thumb = $results->getItems()[0]->getSnippet()->getThumbnails()->getDefault();

        $pic = file_get_contents($thumb->getUrl());

        Storage::put("images/" . Channel::CHANNEL_THUMBMAIL_DIR . "/" . $this->channel->id . ".jpg", $pic);
    }
}
