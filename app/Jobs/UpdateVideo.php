<?php

namespace App\Jobs;

use Google\Client;
use App\Models\Video;
use Google\Service\YouTube;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class UpdateVideo implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(
        protected Video $video,
        protected string $thumbnailUrl,
    ) {}

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $pic = file_get_contents($this->thumbnailUrl);

        Storage::put("images/" . Video::THUMBMAIL_DIR . "/" . $this->video->id . ".jpg", $pic);
    }
}
