<?php

namespace App\Http\Controllers\Pages\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Paket;
use App\Models\PaketKategori;
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
        $data['cpaket'] = PaketKategori::all();

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

            if($request->image_2){
                $filename2 = $request->image_2->getClientOriginalName();
                $request->image_2->storeAs('images/paket/', $filename2, 'public');
                $paket->image_2 = $filename2;
            }
            if($request->image_3){
                $filename3 = $request->image_3->getClientOriginalName();
                $request->image_3->storeAs('images/paket/', $filename3, 'public');
                $paket->image_3 = $filename3;
            }
            if($request->image_4){
                $filename4 = $request->image_4->getClientOriginalName();
                $request->image_4->storeAs('images/paket/', $filename4, 'public');
                $paket->image_4 = $filename4;
            }
            if($request->image_5){
                $filename5 = $request->image_5->getClientOriginalName();
                $request->image_5->storeAs('images/paket/', $filename5, 'public');
                $paket->image_5 = $filename5;
            }
            
            $filename = $request->image->getClientOriginalName();
            $request->image->storeAs('images/paket/', $filename, 'public');
            $paket->image = $filename;
            $paket->user_id = auth()->user()->id;
            $paket->name = $request->name;
            $paket->cpaket_id = $request->cpaket_id;
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

        return redirect()->route('admin.paket.index')->with('success', 'Data berhasil diupdate.');
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
        $data['title'] = "SkyDash";
        $data['menu'] = "Kelola Paket";
        $data['submenu'] = "Edit Paket";
        $data['paket'] = Paket::findOrFail($id);
        $data['cpaket'] = PaketKategori::all();

        return view('pages.paket.paket-edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $paket = Paket::findOrFail($id);

        if($request->hasFile('image')){
            $filename = $request->image->getClientOriginalName();
            $request->image->storeAs('images/paket/', $filename, 'public');
            $paket->image = $filename;
            $paket->save();

            return back()->with('success', 'Foto berhasil diupdate.');
        }
        if($request->hasFile('image_1')){
            $filename1 = $request->image_1->getClientOriginalName();
            $request->image_1->storeAs('images/paket/', $filename1, 'public');
            $paket->image_1 = $filename1;
            $paket->save();

            return back()->with('success', 'Foto Plus 1 berhasil ditambahkan.');
        }
        if($request->hasFile('image_2')){
            $filename2 = $request->image_2->getClientOriginalName();
            $request->image_2->storeAs('images/paket/', $filename2, 'public');
            $paket->image_2 = $filename2;
            $paket->save();

            return back()->with('success', 'Foto Plus 2 berhasil ditambahkan.');
        }
        if($request->hasFile('image_3')){
            $filename3 = $request->image_3->getClientOriginalName();
            $request->image_3->storeAs('images/paket/', $filename3, 'public');
            $paket->image_3 = $filename3;
            $paket->save();

            return back()->with('success', 'Foto Plus 3 berhasil ditambahkan.');
        }
        if($request->hasFile('image_4')){
            $filename4 = $request->image_4->getClientOriginalName();
            $request->image_4->storeAs('images/paket/', $filename4, 'public');
            $paket->image_4 = $filename4;
            $paket->save();

            return back()->with('success', 'Foto Plus 4 berhasil ditambahkan.');
        }
        if($request->hasFile('image_5')){
            $filename5 = $request->image_5->getClientOriginalName();
            $request->image_5->storeAs('images/paket/', $filename5, 'public');
            $paket->image_5 = $filename5;
            $paket->save();

            return back()->with('success', 'Foto Plus 5 berhasil ditambahkan.');
        }
        $paket->cpaket_id = $request->input('cpaket_id');
        $paket->name = $request->input('name');
        $paket->price = $request->input('price');
        $paket->user_id = auth()->user()->id;

        $paket->description = $request->input('description');
        $paket->save();
        return back()->with('success', 'Data berhasil diupdate.');
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $paket = Paket::find($id);
        $paket->delete();

        return back()->with('success', 'Data berhasil dihapus.');
    }
}
