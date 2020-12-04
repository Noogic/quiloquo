<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateThreadRequest;
use App\Http\Resources\ThreadResource;
use App\Models\Category;
use App\Models\Thread;

class CategoryThreadsController 
{
    public function index(Category $category)
    {
        return ThreadResource::collection($category->threads);
    }

    public function store(Category $category, CreateThreadRequest $request)
    {
        $thread = new Thread($request->validated());
        $category->threads()->save($thread);
        return $thread->toArray();
    }
}
