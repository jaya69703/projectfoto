<?php

namespace App\Http\Controllers\Pages\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Worker;
use Auth;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['title'] = "SkyDash";
        $data['menu'] = "Dashboard";
        $data['submenu'] = Auth::user()->name;

        return view('base.base-home', $data);
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
    public function show()
    {
        $data['title'] = "SkyDash";
        $data['menu'] = "Profile";
        $data['submenu'] = 'Edit Profile';

        return view('base.base-profile', $data);
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
        $userId = Auth::id();
        $user = User::findOrFail($userId); // Memanggil 'firstOrFail()' untuk mendapatkan objek user

        Auth()->user()->update(['name'=>$request->input('worker_name')]);


        if($request->hasFile('image')){
            $oldPhoto = $user->image;

            if ($oldPhoto !== 'default.png' && Storage::disk('public')->exists('images/user/' . $oldPhoto)) {
                Storage::disk('public')->delete('images/user/' . $oldPhoto);
            }

            $filename = $request->image->getClientOriginalName();
            $request->image->storeAs('images/user/', $filename, 'public');
            Auth()->user()->update(['image'=>$filename]);
            // $user->update(['image' => $filename]);
            // $user->save();
            // dd($oldPhoto);
            return redirect()->route('admin.profile.index')->with('success', 'Foto berhasil diupdate.');
        }

        $code = Auth::user()->code;
        $worker = Worker::where('code', $code);

        $worker->update([
            // IDENTITAS ACCOUNT
            'worker_name' => $request->input('worker_name'),
            'worker_nitk' => $request->input('worker_nitk'),
            // 'divisi_id' => $request->input('divisi_id'),
            // 'position_id' => $request->input('position_id'),
            'worker_start' => $request->input('worker_start'),
            'worker_end' => $request->input('worker_end'),
            'worker_sknumber' => $request->input('worker_sknumber'),

            // PRIVATE DATA
            'worker_kawin' => $request->input('worker_kawin'),
            'worker_niknumber' => $request->input('worker_niknumber'),
            'worker_kknumber' => $request->input('worker_kknumber'),
            // 'worker_email' => $request->input('worker_email'),
            // 'worker_phone' => $request->input('worker_phone'),
            'worker_placebirth' => $request->input('worker_placebirth'),
            'worker_datebirth' => $request->input('worker_datebirth'),
            'worker_gender' => $request->input('worker_gender'),
            'worker_religion' => $request->input('worker_religion'),

            // KONTAK DARUTAT
            'worker_mother' => $request->input('worker_mother'),
            'worker_phonemother' => $request->input('worker_phonemother'),
            'worker_father' => $request->input('worker_father'),
            'worker_phonefather' => $request->input('worker_phonefather'),
            'worker_wali' => $request->input('worker_wali'),
            'worker_phonewali' => $request->input('worker_phonewali'),

        ]);

        return redirect()->route('admin.profile.index')->with('success', 'Data berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
