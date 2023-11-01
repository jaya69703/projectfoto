<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gallery;
use App\Models\PaketKategori;
use App\Models\Paket;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['title'] = 'Skydash';
        $data['menu'] = 'Kelola Galeri';
        $data['submenu'] = 'Daftar Galeri';
        $data['gallery'] = Gallery::all();

        return view('pages.gallery.gallery-index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['title'] = 'Skydash';
        $data['menu'] = 'Kelola Galeri';
        $data['submenu'] = 'Daftar Galeri';
        // $data['gallery'] = Gallery::all();
        $data['cpaket'] = PaketKategori::all();
        $data['paket'] = Paket::all();

        return view('pages.gallery.gallery-create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'cpaket_id' => 'required',
            'paket_id' => 'required',
            'name' => 'required',
            'desc' => 'required',
            'cover' => 'required|image|max:2048',
            'image_1' => 'nullable|image|max:2048',
            'image_2' => 'nullable|image|max:2048',
            'image_3' => 'nullable|image|max:2048',
            'image_4' => 'nullable|image|max:2048',
            'image_5' => 'nullable|image|max:2048',
        ]);
    
        $gallery = new Gallery;
    
        if ($request->hasFile('cover')) {
            $filename = $request->cover->storeAs('images/gallery/', $request->cover->getClientOriginalName(), 'public');
            $gallery->cover = $filename;
        }
        // Cek apakah ada file yang diupload untuk gambar 1
        if ($request->hasFile('image_1')) {
            $filename = $request->image_1->storeAs('images/gallery/', $request->image_1->getClientOriginalName(), 'public');
            $gallery->image_1 = $filename;
        }
    
        // Cek apakah ada file yang diupload untuk gambar 2
        if ($request->hasFile('image_2')) {
            $filename = $request->image_2->storeAs('images/gallery/', $request->image_2->getClientOriginalName(), 'public');
            $gallery->image_2 = $filename;
        }
    
        // Cek apakah ada file yang diupload untuk gambar 3
        if ($request->hasFile('image_3')) {
            $filename = $request->image_3->storeAs('images/gallery/', $request->image_3->getClientOriginalName(), 'public');
            $gallery->image_3 = $filename;
        }
    
        // Cek apakah ada file yang diupload untuk gambar 4
        if ($request->hasFile('image_4')) {
            $filename = $request->image_4->storeAs('images/gallery/', $request->image_4->getClientOriginalName(), 'public');
            $gallery->image_4 = $filename;
        }
        // Cek apakah ada file yang diupload untuk gambar 4
        if ($request->hasFile('image_5')) {
            $filename = $request->image_5->storeAs('images/gallery/', $request->image_5->getClientOriginalName(), 'public');
            $gallery->image_5 = $filename;
        }
    
        $gallery->user_id = auth()->user()->id;
        $gallery->name = $request->name;
        $gallery->desc = $request->desc;
        $gallery->slug = \Str::slug($request->name);
        $gallery->paket_id = $request->paket_id;
        $gallery->cpaket_id = $request->cpaket_id;
    
        $gallery->save();
    
        // dd($request->all());
        return back()->with('success', 'Gallery berhasil ditambahkan');
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
        $data['title'] = 'Skydash';
        $data['menu'] = 'Kelola Galeri';
        $data['submenu'] = 'Edit Galeri';
        $data['gallery'] = Gallery::findOrFail($id);
        $data['cpaket'] = PaketKategori::all();
        $data['paket'] = Paket::all();

        return view('pages.gallery.gallery-edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        // $request->validate([
        //     'cpaket_id' => 'required',
        //     'paket_id' => 'required',
        //     'cover' => 'required|image|max:2048',
        //     'image_1' => 'nullable|image|max:2048',
        //     'image_2' => 'nullable|image|max:2048',
        //     'image_3' => 'nullable|image|max:2048',
        //     'image_4' => 'nullable|image|max:2048',
        // ]);
    
        // dd($request->all());
        $gallery = Gallery::findOrFail($id);
    

        if ($request->hasFile('cover')) {
            $filename = $request->cover->storeAs('images/gallery/', $request->cover->getClientOriginalName(), 'public');
            $gallery->cover = $filename;
        }
        // Cek apakah ada file yang diupload untuk gambar 1
        if ($request->hasFile('image_1')) {
            $filename1 = $request->image_1->storeAs('images/gallery/', $request->image_1->getClientOriginalName(), 'public');
            $gallery->image_1 = $filename1;
        }
    
        // Cek apakah ada file yang diupload untuk gambar 2
        if ($request->hasFile('image_2')) {
            $filename2 = $request->image_2->storeAs('images/gallery/', $request->image_2->getClientOriginalName(), 'public');
            $gallery->image_2 = $filename2;
        }
    
        // Cek apakah ada file yang diupload untuk gambar 3
        if ($request->hasFile('image_3')) {
            $filename3 = $request->image_3->storeAs('images/gallery/', $request->image_3->getClientOriginalName(), 'public');
            $gallery->image_3 = $filename3;
        }
    
        // Cek apakah ada file yang diupload untuk gambar 4
        if ($request->hasFile('image_4')) {
            $filename4 = $request->image_4->storeAs('images/gallery/', $request->image_4->getClientOriginalName(), 'public');
            $gallery->image_4 = $filename4;
        }
        // Cek apakah ada file yang diupload untuk gambar 4
        if ($request->hasFile('image_5')) {
            $filename4 = $request->image_5->storeAs('images/gallery/', $request->image_5->getClientOriginalName(), 'public');
            $gallery->image_5 = $filename5;
        }
    
        $gallery->user_id = auth()->user()->id;
        $gallery->name = $request->name;
        $gallery->desc = $request->desc;
        $gallery->slug = \Str::slug($request->name);
        $gallery->paket_id = $request->paket_id;
        $gallery->cpaket_id = $request->cpaket_id;
    
        $gallery->save();
    
        // dd($request->all());
        return back()->with('success', 'Gallery berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $gallery = Gallery::findOrFail($id);
        $gallery->delete();

        return back()->with('success', 'Gallery berhasil dihapus');
    }
}
