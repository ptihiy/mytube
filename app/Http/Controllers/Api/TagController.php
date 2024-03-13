<?php

namespace App\Http\Controllers\Api;

use App\Models\Tag;
use Illuminate\Http\Request;
use App\Http\Resources\TagResource;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\StoreTagRequest;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return TagResource::collection(Tag::withCount('channels')->get());
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
    public function store(StoreTagRequest $request)
    {
        $tag = new Tag;
        $tag->title = $request->input('title');
        $tag->slug = $request->input('slug');
        $tag->description = $request->input('description');
        $tag->save();

        return true;
    }

    /**
     * Display the specified resource.
     */
    public function show(Tag $tag): TagResource
    {
        return new TagResource($tag);
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
        Tag::destroy($id);
    }
}
