<?php

namespace App\Http\Controllers\Pages\Base;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['title'] = 'AR Project';
        $data['menu'] = 'Kelola Halaman';
        $data['submenu'] = 'Halaman';
        $data['page'] = Page::all();
        $data['tpage'] = Page::where('page_type', 0)->get();

        // dd($data['tpage']);
        return view('pages.manage.manage-page', $data);
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
            'page_name' => 'required|max:255',
            'page_type' => 'integer|max:1',
            'page_link' => 'required|max:255',
            'page_desc' => 'required|max:255',
            'page_id' => 'nullable|max:255',
        ]);

        $page = new Page;
        $page->page_name = $request->page_name;
        $page->page_type = $request->page_type;
        $page->page_link = $request->page_link;
        $page->page_desc = $request->page_desc;
        $page->page_id = $request->page_id;
        $page->save();

        return redirect()->route('admin.pages.index')->with('success', 'Halaman Berhasil dibuat...');
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
        // $page = Page::findorFail($id);
        $request->validate([
            'page_name' => 'required|max:255',
            'page_type' => 'integer|max:1',
            'page_link' => 'required|max:255',
            'page_desc' => 'required|max:255',
            'page_id' => 'nullable|max:255',
        ]);

        // $page = new Page;
        $page = Page::findorFail($id);
        $page->page_name = $request->page_name;
        $page->page_type = $request->page_type;
        $page->page_link = $request->page_link;
        $page->page_desc = $request->page_desc;
        $page->page_id = $request->page_id;
        $page->save();

        return redirect()->route('admin.pages.index')->with('success', 'Halaman Berhasil diedit...');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $page = Page::findorFail($id);
        $page->delete();

        return redirect()->route('admin.pages.index')->with('success', 'Data berhasil dihapus...');
    }
}
