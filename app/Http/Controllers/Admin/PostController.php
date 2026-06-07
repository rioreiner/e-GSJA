<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\StorePostRequest;
use App\Http\Requests\Post\UpdatePostRequest;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PostController extends Controller
{
    public function index(Request $request): View
    {
        $query = Post::with('user');

        if ($search = $request->get('search')) {
            $query->search($search);
        }

        if ($status = $request->get('status')) {
            $query->where('status', $status);
        }

        $posts = $query->latest()->paginate(12)->withQueryString();

        return view('admin.posts.index', compact('posts'));
    }

    public function create(): View
    {
        return view('admin.posts.create');
    }

    public function store(StorePostRequest $request): RedirectResponse
    {
        $data            = $request->validated();
        $data['user_id'] = auth()->id();
        $data['slug']    = Post::generateUniqueSlug($data['judul']);

        if ($request->hasFile('gambar')) {
            $file         = $request->file('gambar');
            $filename     = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/gambar'), $filename);
            $data['gambar'] = $filename;
        }

        Post::create($data);

        return redirect()->route('admin.posts.index')
            ->with('success', 'Berita berhasil ditambahkan.');
    }

    public function show(Post $post): View
    {
        return view('admin.posts.show', compact('post'));
    }

    public function edit(Post $post): View
    {
        return view('admin.posts.edit', compact('post'));
    }

    public function update(UpdatePostRequest $request, Post $post): RedirectResponse
    {
        $data = $request->validated();

        if ($request->hasFile('gambar')) {
            if ($post->gambar && file_exists(public_path('uploads/gambar/' . $post->gambar))) {
                unlink(public_path('uploads/gambar/' . $post->gambar));
            }
            $file           = $request->file('gambar');
            $filename       = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/gambar'), $filename);
            $data['gambar'] = $filename;
        }

        // Regenerate slug if title changed
        if ($data['judul'] !== $post->judul) {
            $data['slug'] = Post::generateUniqueSlug($data['judul']);
        }

        $post->update($data);

        return redirect()->route('admin.posts.index')
            ->with('success', 'Berita berhasil diperbarui.');
    }

    public function destroy(Post $post): RedirectResponse
    {
        if ($post->gambar && file_exists(public_path('uploads/gambar/' . $post->gambar))) {
            unlink(public_path('uploads/gambar/' . $post->gambar));
        }
        $post->delete();

        return redirect()->route('admin.posts.index')
            ->with('success', 'Berita berhasil dihapus.');
    }
}