<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    // 🔹 Form tambah post
    public function create()
    {
        return view('posts.create');
    }

    // 🔹 Simpan post baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'user_id' => auth()->id(),
        ]);

        return redirect('/dashboard')->with('success', 'Post berhasil dibuat!');
    }

    // 🔹 Form edit post
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.edit', compact('post'));
    }

    // 🔹 Update data post
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        $post = Post::findOrFail($id);
        $post->update([
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return redirect('/dashboard')->with('success', 'Post berhasil diubah!');
    }

    // 🔹 Hapus post
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect('/dashboard')->with('success', 'Post berhasil dihapus!');
    }
}
