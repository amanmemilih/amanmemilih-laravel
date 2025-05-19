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

        if ($data->isEmpty()) {
            return $this->sendResponse('No blogs found', [], 404);
        }

        return $this->sendResponse('Blog successfully retrieved', data: array_map(function ($row) {
            return [
                'id' => $row['id'],
                'thumbnail' => asset('storage/blogs/' . $row['thumbnail']),
                'created_at' => $row['created_at'],
                'body' => $row['body'],
                'title' => $row['title'],
            ];
        }, $data->toArray()));
    }

    public function destroy($id)
    {
        $blog = Blog::find($id);

        if (!$blog) {
            return $this->sendResponse('Blog not found', [], 404);
        }

        $blog->delete();

        return $this->sendResponse('Blog successfully deleted');
    }

    public function show(Blog $blog)
    {
        return $this->sendResponse('Blog successfully retrieved', data: [
            'id' => $blog->id,
            'thumbnail' => asset('storage/blogs/' . $blog->thumbnail),
            'created_at' => $blog->created_at,
            'body' => $blog->body,
            'title' => $blog->title,
        ]);
    }
}
