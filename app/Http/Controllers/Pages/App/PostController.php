<?php

namespace App\Http\Controllers\Pages\App;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{CategoryB, TagsB, Post};
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['title'] = "AR Projects";
        $data['menu'] = "Blog Menu";
        $data['submenu'] = "Daftar Postingan";
        $data['category'] = CategoryB::all();
        $data['tags'] = TagsB::all();
        $data['posts'] = Post::all();

        return view('pages.blog.post-index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['title'] = "AR Projects";
        $data['menu'] = "Blog Menu";
        $data['submenu'] = "Buat Postingan";
        $data['category'] = CategoryB::all();
        $data['tags'] = TagsB::all();
        $data['posts'] = Post::all();

        return view('pages.blog.post-create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'cover' => 'required',
            'title' => 'required',
            // 'user_id' => 'required',
            'category_id' => 'required',
            'tagsb' => 'array|required',
            'desc' => 'required',
            'keywords' => 'required',
            'meta_desc' => 'required',
        ]);

        $post = new Post;

        if ($request->hasFile('cover')) {
            $filename = $request->cover->getClientOriginalName();
            $request->cover->storeAs('images/cover/', $filename, 'public');

            $post->cover = $filename;
            $post->title = $request->title;
            $post->slug = \Str::slug($request->title);
            $post->user_id = Auth::id();
            $post->category_id = $request->category_id;
            $post->desc = $request->desc;
            $post->keywords = $request->keywords;
            $post->meta_desc = $request->meta_desc;
            $post->save(); // Simpan post terlebih dahulu

            $tagsB = TagsB::find($request->tagsb); // Ganti 'find' dengan metode lain jika diperlukan

            if ($tagsB) {
                foreach ($tagsB as $tag) {
                    $post->tagsb()->attach($tag->id);
                }
            } else {
                return redirect()->back()->with('error', 'Tag tidak ditemukan.');
            }

            // dd($request->all());
            return redirect()->back()->with('success', 'Berhasil ditambahkan.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
