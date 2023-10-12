<?php

namespace App\Http\Controllers\Pages\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Paket;
use Illuminate\Support\Facades\Storage;


class PaketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['title'] = "SkyDash";
        $data['menu'] = "Kelola Paket";
        $data['submenu'] = "Paket";
        $data['paket'] = Paket::all();

        return view('pages.paket.paket-index', $data);
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
            'image' => 'required|mimes:png,jpg|max:2048',
            'price' => 'required|integer',
            'description' => 'required',
        ]);

        $paket = new Paket;

        if($request->hasFile('image')){
            $oldPhoto = $paket->image;

            if ($oldPhoto !== 'default.png' && Storage::disk('public')->exists('images/paket/' . $oldPhoto)) {
                Storage::disk('public')->delete('images/paket/' . $oldPhoto);
            }

            $filename = $request->image->getClientOriginalName();
            $request->image->storeAs('images/paket/', $filename, 'public');

            $paket->image = $filename;
            $paket->name = $request->name;
            $paket->price = $request->price;
            $paket->slug = \Str::slug($request->name);
            $paket->description = $request->description;

            $paket->save();
            // Auth()->web()->update(['image'=>$filename]);
            return redirect()->route('admin.paket.index')->with('success', 'Data berhasil ditambahkan.');
        }

        $paket->name = $request->name;
        $paket->price = $request->price;
        $paket->slug = \Str::slug($request->name);
        $paket->description = $request->description;
        $paket->save();

        return redirect()->route('admin.app.setting.index')->with('success', 'Data berhasil diupdate.');
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
            'image' => 'required|mimes:png,jpg|max:2048',
            'price' => 'required|integer',
            'description' => 'required',
        ]);

        $paket = Paket::find($id);

        if($request->hasFile('image')){
            $oldPhoto = $paket->image;

            if ($oldPhoto !== 'default.png' && Storage::disk('public')->exists('images/paket/' . $oldPhoto)) {
                Storage::disk('public')->delete('images/paket/' . $oldPhoto);
            }

            $filename = $request->image->getClientOriginalName();
            $request->image->storeAs('images/paket/', $filename, 'public');

            $paket->image = $filename;
            $paket->name = $request->name;
            $paket->price = $request->price;
            $paket->slug = \Str::slug($request->name);
            $paket->description = $request->description;

            $paket->save();
            // Auth()->web()->update(['image'=>$filename]);
            return redirect()->route('admin.paket.index')->with('success', 'Photo berhasil diupdate.');
        }

        $paket->name = $request->name;
        $paket->price = $request->price;
        $paket->description = $request->description;
        $paket->slug = \Str::slug($request->name);
        $paket->save();

        return redirect()->route('admin.paket.index')->with('success', 'Data berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $paket = Paket::find($id);
        $paket->delete();

        return redirect()->route('admin.app.setting.index')->with('success', 'Data berhasil dihapus.');
    }
}
