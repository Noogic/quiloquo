<?php

namespace App\Http\Controllers;

use App\Http\Resources\ThreadResource;
use App\Models\Thread;
use Illuminate\Http\Request;

class ThreadController
{
    public function index() {
        return ThreadResource::collection(Thread::paginate());
    }

    public function show(Thread $thread)
    {
        return new ThreadResource($thread);
    }

    public function update(Thread $thread, UpdateThreadRequest $request)
    {
        $thread->update($request->validated());
        return new ThreadResource($thread);
    }

    public function destroy(Thread $thread)
    {
        $thread->delete();
        return response('', 204);
    }
}
