<?php

namespace App\Http\Controllers\Api;

use App\Models\Tag;
use App\Models\Channel;
use App\Jobs\UpdateChannel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ChannelResource;

class ChannelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return ChannelResource::collection(Channel::all());
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
    public function store(Request $request)
    {
        $channel = new Channel;
        $channel->title = $request->input('title');
        $channel->y_id = $request->input('y_id');
        $channel->save();

        $tags = [];
        foreach ($request->input('tags') as $tagStub) {
            $tags[] = Tag::firstOrCreate([
                'id' => $tagStub['id'],
                'title' => $tagStub['title'],
            ]);
        }

        \Log::info('tags', $tags);

        $channel->tags()->sync(array_map(function ($e) { return $e->id; }, $tags));

        UpdateChannel::dispatch($channel);

        return true;
    }

    /**
     * Display the specified resource.
     */
    public function show(Channel $channel): ChannelResource
    {
        return new ChannelResource($channel);
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
        Channel::destroy($id);
    }
}
