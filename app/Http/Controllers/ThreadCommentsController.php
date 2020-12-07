<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCommentRequest;
use App\Http\Resources\CommentResource;
use App\Models\Comment;
use App\Models\Thread;

class ThreadCommentsController
{
    public function index(Thread $thread)
    {
        return CommentResource::collection($thread->comments);
    }

    public function store(Thread $thread, CreateCommentRequest $request)
    {
        $comment = new Comment($request->validated());
        $thread->comments()->save($comment);
        return $comment->toArray();
    }
}
