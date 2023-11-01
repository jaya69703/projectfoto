<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PaketKategori;

class PaketKategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['title'] = 'ARShoot';
        $data['menu'] = 'Kelola Paket';
        $data['submenu'] = 'Daftar Kategori';
        $data['cpaket'] = PaketKategori::all();

        return view('pages.paket.paket-kategori-index', $data);
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
            'name' => ['required', 'max:128'],
        ]);

        $cpaket = new PaketKategori;
        $cpaket->name = $request->name;
        $cpaket->slug = \Str::slug($request->name);
        $cpaket->save();

        return back()->with('success', 'Tambah kategori paket telah berhasil...');
    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        $data['title'] = 'ARShoot';
        $data['menu'] = 'Kategori Paket';
        $data['submenu'] = 'Lihat Kategori';
        // $paketKategori = PaketKategori::with('paket')->get();
        $data['paket'] = PaketKategori::with('paket')->get();
        $data['cpaket'] = PaketKategori::all();

        dd($data['paket']);
        return view('pages.root.root-pages-projects', $data);
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
            'name' => ['required', 'max:128'],
        ]);
        $cpaket = PaketKategori::findOrFail($id);
        $cpaket->name = $request->name;
        $cpaket->slug = \Str::slug($request->name);
        $cpaket->save();

        // dd($request->all());
        return back()->with('success', 'Update kategori paket telah berhasil...');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cpaket = PaketKategori::findOrFail($id);
        $cpaket->delete();

        return back()->with('success', 'Hapus kategori paket telah berhasil...');
    }
}
