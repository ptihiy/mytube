<?php

namespace App\Http\Resources;

use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Resources\Json\JsonResource;

class VideoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $thumbnailPath = 'images/' . Video::THUMBMAIL_DIR . "/" . $this->id . '.jpg';

        return [
            'id' => $this->id,
            'title' => $this->title,
            'thumbnailUrl' => Storage::exists($thumbnailPath) ? url($thumbnailPath) : null,
        ];
    }
}
