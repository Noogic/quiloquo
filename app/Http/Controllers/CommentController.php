<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateCommentRequest;
use App\Http\Resources\CommentResource;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController
{
    public function show(Comment $comment)
    {
        return new CommentResource($comment);
    }

    public function update(Comment $comment, UpdateCommentRequest $request)
    {
        $comment->update($request->validated());
        return new CommentResource($comment);
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();
        return response('', 204);
    }
}
