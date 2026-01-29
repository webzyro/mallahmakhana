<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Cache;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Cache::remember('blogs', 3600, function () {
            return Blog::where('is_active', true)->orderBy('created_at', 'desc')->paginate(6);
        });
        // dd($blogs);
        return view('front.blog', ['blogs' => $blogs]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        $blog = Blog::where('slug', $slug)->first();
        return view('front.blog-show', ['blog' => $blog]);
    }

}
