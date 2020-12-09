<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Support\Facades\Log;

class CategoryController
{
    public function index()
    {
        return CategoryResource::collection(Category::paginate());
    }

    public function show(Category $category)
    {
        return new CategoryResource($category);
    }

    public function store(CreateCategoryRequest $request)
    {
        if (! $request->wantsJson()) {
            return abort(406);
        }

        $category = Category::create($request->validated());

        return new CategoryResource($category);
    }

    public function update(Category $category, UpdateCategoryRequest $request)
    {
        $category->update($request->validated());

        return new CategoryResource($category);
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return response('', 204);
    }
}
