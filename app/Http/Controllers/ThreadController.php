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
}
