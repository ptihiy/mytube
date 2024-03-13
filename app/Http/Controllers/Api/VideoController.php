<?php

namespace App\Http\Controllers\Api;

use App\Models\Video;
use App\Jobs\UpdateVideo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\VideoResource;
use App\Services\YoutubeCollectorService;
use App\Http\Requests\Api\StoreTagRequest;
use App\Http\Requests\Api\StoreVideoRequest;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return VideoResource::collection(Video::all());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(YoutubeCollectorService $ycService, StoreVideoRequest $request)
    {
        $video_y_id = $request->input('video_y_id');

        try {
            $videoInfo = $ycService->getVideoInfo($video_y_id);

            $video = new Video;
            $video->y_id = $video_y_id;
            $video->title = $videoInfo->getTitle();
            $video->description = $videoInfo->getDescription();
            $video->save();

            if ($thumbnailUrl = $videoInfo->getThumbnailUrl()) {
                UpdateVideo::dispatchSync($video, $thumbnailUrl);
            }
        } catch (\Exception $e) {
            \Log::info('VideoController@store', ['message' => $e->getMessage()]);
            // TODO
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Video $video): VideoResource
    {
        return new VideoResource($video);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
