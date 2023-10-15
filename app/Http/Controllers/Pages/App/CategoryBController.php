<?php

namespace App\Http\Controllers\Pages\App;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CategoryB;
use Illuminate\Support\Facades\Validator;


class CategoryBController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['title'] = "AR Projects";
        $data['menu'] = "Blog Menu";
        $data['submenu'] = "Daftar Category";
        $data['category'] = CategoryB::all();

        return view('pages.blog.category-index', $data);
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

        $category = new CategoryB;
        $category->name = $request->name;
        $category->slug = \Str::slug($request->name);
        $category->keywords = $request->keywords;
        $category->meta_desc = $request->meta_desc;
        $category->save();

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

        $category = CategoryB::findorFail($id);
        $category->name = $request->name;
        $category->slug = \Str::slug($request->name);
        $category->keywords = $request->keywords;
        $category->meta_desc = $request->meta_desc;
        $category->save();

        return redirect()->back()->with('success','Data updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = CategoryB::findorFail($id);
        $category->delete();

        return redirect()->back()->with('success','Data deleted successfully');
    }
}
