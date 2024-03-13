<?php

namespace App\Http\Resources;

use App\Models\Channel;
use Illuminate\Http\Request;
use App\Http\Resources\TagResource;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Resources\Json\JsonResource;

class ChannelResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $thumbnailPath = 'images/' . Channel::CHANNEL_THUMBMAIL_DIR . "/" . $this->id . '.jpg';

        return [
            'id' => $this->id,
            'title' => $this->title,
            'thumbnailUrl' => Storage::exists($thumbnailPath) ? url($thumbnailPath) : null,
            'tags' => TagResource::collection($this->tags),
        ];
    }
}
