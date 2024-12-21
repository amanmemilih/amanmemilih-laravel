<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Traits\ApiTrait;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    use ApiTrait;

    public function index()
    {
        $data = Blog::get();
        return $this->sendResponse('Blog successfully retrieved', data: $data);
    }

    public function show(Blog $blog)
    {
        return $this->sendResponse('Blog successfully retrieved', data: $blog);
    }
}
