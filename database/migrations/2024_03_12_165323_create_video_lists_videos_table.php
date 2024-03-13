<?php

use App\Models\Video;
use App\Models\VideoList;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('video_lists_videos', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(VideoList::class);
            $table->foreignIdFor(Video::class);
            $table->unsignedInteger('position');
            $table->boolean('watched');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('video_lists_videos');
    }
};
