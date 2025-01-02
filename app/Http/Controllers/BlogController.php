<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Traits\ImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    use ImageTrait;

    public function index()
    {
        $data['blog'] = Blog::get();
        return view('blog.index', $data);
    }

    public function create()
    {
        return view('blog.create');
    }

    public function edit(Blog $blog)
    {
        return view('blog.edit', compact('blog'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required',
            'thumbnail' => 'mimes:png,jpg,jpeg|max:2048|required',
        ]);

        $image = $this->uploadFileFromRequest('thumbnail', 'blogs');

        Blog::create([
            'title' => $request->title,
            'body' => $request->body,
            'thumbnail' => $image,
            'admin_id' => Auth::id(),
        ]);

        return redirect()->route('blogs.index')->with('success', 'Action successfully completed.');
    }

    public function update(Request $request, Blog $blog)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required',
            'thumbnail' => 'mimes:png,jpg,jpeg|max:2048|nullable',
        ]);

        $image = $this->uploadFileFromRequest('thumbnail', 'blogs');

        $blog->title = $request->title;
        $blog->body = $request->body;

        if ($image) {
            Storage::disk('public')->delete('blogs/' . $blog->thumbnail);
            $blog->thumbnail = $image;
        }

        $blog->save();

        return redirect()->route('blogs.index')->with('success', 'Action successfully completed.');
    }

    public function destroy(Blog $blog)
    {
        try {
            $blog->delete();
            Storage::disk('public')->delete('blogs/' . $blog->thumbnail);
            return back()->with('success', 'Action successfully completed.');
        } catch (\Exception $e) {
            return back()->with('error', "Somethin went wrong with code {$e->getCode()}");
        }
    }
}
