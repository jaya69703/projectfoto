<?php

namespace App\Http\Controllers\Pages\App;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TagsB;

class TagBController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['title'] = "AR Projects";
        $data['menu'] = "Blog Menu";
        $data['submenu'] = "Daftar Category";
        $data['tags'] = TagsB::all();

        return view('pages.blog.tag-index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'keywords' => 'required',
            'meta_desc' => 'required'
        ]);

        $tags = new TagsB;
        $tags->name = $request->name;
        $tags->slug = \Str::slug($request->name);
        $tags->keywords = $request->keywords;
        $tags->meta_desc = $request->meta_desc;
        $tags->save();

        return redirect()->back()->with('success','Data added successfully');
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
        $request->validate([
            'name' => 'required',
            'keywords' => 'required',
            'meta_desc' => 'required'
        ]);

        $tags = TagsB::findorFail($id);
        $tags->name = $request->name;
        $tags->slug = \Str::slug($request->name);
        $tags->keywords = $request->keywords;
        $tags->meta_desc = $request->meta_desc;
        $tags->save();

        return redirect()->back()->with('success','Data updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tags = TagsB::findorFail($id);
        $tags->delete();

        return redirect()->back()->with('success','Data deleted successfully');
    }
}
