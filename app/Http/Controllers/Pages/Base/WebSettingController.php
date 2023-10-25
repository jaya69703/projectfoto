<?php

namespace App\Http\Controllers\Pages\Base;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WebSetting;
use Illuminate\Support\Facades\Storage;


class WebSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['title'] = "SkyDash";
        $data['menu'] = "Pengaturan";
        $data['submenu'] = "Data Informasi Website";
        $data['web'] = WebSetting::all();

        return view('pages.app.setting.setting-index', $data);
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
        //
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
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'site_link' => 'required',
            'site_qris' => 'nullable|mimes:png,jpg|max:2048',
            'image' => 'nullable|mimes:png,jpg|max:2048',
            'site_social_ig' => 'nullable|max:255',
            'site_social_fb' => 'nullable|max:255',
            'site_social_tw' => 'nullable|max:255',
            'site_social_in' => 'nullable|max:255',
        ]);

        $web = WebSetting::findOrFail(1);

        if($request->hasFile('image')){
            $oldPhoto = $web->image;

            if ($oldPhoto !== 'default.png' && Storage::disk('public')->exists('images/web/' . $oldPhoto)) {
                Storage::disk('public')->delete('images/web/' . $oldPhoto);
            }

            $filename = $request->image->getClientOriginalName();
            $request->image->storeAs('images/web/', $filename, 'public');
            $web->image = $filename;

            $web->save();
            // Auth()->web()->update(['image'=>$filename]);
            return redirect()->route('admin.app.setting.index')->with('success', 'Foto berhasil diupdate.');
        }

        if($request->hasFile('site_qris')){
            $oldPhoto = $web->site_qris;

            if ($oldPhoto !== 'qris.png' && Storage::disk('public')->exists('images/web/' . $oldPhoto)) {
                Storage::disk('public')->delete('images/web/' . $oldPhoto);
            }

            $filename = $request->site_qris->getClientOriginalName();
            $request->site_qris->storeAs('images/web/', $filename, 'public');
            $web->site_qris = $filename;

            $web->save();
            // Auth()->web()->update(['image'=>$filename]);
            return redirect()->route('admin.app.setting.index')->with('success', 'Foto berhasil diupdate.');
        }

        $web->name = $request->name;
        $web->site_link = $request->site_link;
        $web->site_social_fb = $request->site_social_fb;
        $web->site_social_ig = $request->site_social_ig;
        $web->site_social_in = $request->site_social_in;
        $web->site_social_tw = $request->site_social_tw;
        $web->save();

        return redirect()->route('admin.app.setting.index')->with('success', 'Data berhasil diupdate.');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
