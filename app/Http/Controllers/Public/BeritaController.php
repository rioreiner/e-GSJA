<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Post;

class BeritaController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->paginate(6);

        return view('public.berita.index', compact('posts'));
    }

    public function show($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();

        return view('public.berita.show', compact('post'));
    }
}