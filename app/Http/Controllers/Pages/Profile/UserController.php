<?php

namespace App\Http\Controllers\Pages\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;

class UserController extends Controller
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

        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'code' => 'required',
        ]);

        Auth()->user()->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'code' => $request->code
        ]);


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
            return redirect()->route('member.profile.index')->with('success', 'Foto berhasil diupdate.');
        }


        return redirect()->route('member.profile.index')->with('success', 'Data berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
