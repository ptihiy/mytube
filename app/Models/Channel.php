<?php

namespace App\Models;

use App\Models\Tag;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Channel extends Model
{
    use HasFactory;

    const CHANNEL_THUMBMAIL_DIR = 'channels';

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }

    protected static function booted(): void
    {
        static::deleted(function (Channel $channel) {
            $path = 'images/' . static::CHANNEL_THUMBMAIL_DIR . "/" . $channel->id . '.jpg';
            if (Storage::exists($path)) {
                Storage::delete($path);
            }
        });
    }
}
