<?php

namespace App\Http\Controllers\Pages\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Models\User;
use App\Models\Author;
use App\Models\Booking;
use Auth;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['title'] = "SkyDash";
        $data['menu'] = "Dashboard";
        $data['submenu'] = 'Author';

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
        $data['submenu'] = 'Author';

        return view('base.base-profile', $data);
    }

    public function viewBooking()
    {
        $data['title'] = "SkyDash";
        $data['menu'] = "Kelola Pesanan";
        $data['submenu'] = 'Lihat Pesanan';
        $data['book'] = Booking::where('book_stat', 6)->get();


        return view('pages.booking.author-booking', $data);
    }

    public function sendProduct(Request $request, $id)
    {
        $book = Booking::findorFail($id);
        $book->book_done = $request->book_done;
        $book->book_stat = 7;
        $book->save();

        return back()->with('success', 'Kirim paket berhasil...');
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

        Auth()->user()->update(['name'=>$request->input('author_name')]);


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
            return redirect()->route('author.profile.index')->with('success', 'Foto berhasil diupdate.');
        }

        $code = Auth::user()->code;
        $author = Author::where('code', $code);

        $author->update([
            // IDENTITAS ACCOUNT
            'author_name' => $request->input('author_name'),
            // 'author_nitk' => $request->input('author_nitk'),
            // 'divisi_id' => $request->input('divisi_id'),
            // 'position_id' => $request->input('position_id'),
            'author_start' => $request->input('author_start'),
            'author_end' => $request->input('author_end'),
            // 'author_sknumber' => $request->input('author_sknumber'),

            // PRIVATE DATA
            'author_kawin' => $request->input('author_kawin'),
            'author_niknumber' => $request->input('author_niknumber'),
            // 'author_kknumber' => $request->input('author_kknumber'),
            // 'author_email' => $request->input('author_email'),
            // 'author_phone' => $request->input('author_phone'),
            'author_placebirth' => $request->input('author_placebirth'),
            'author_datebirth' => $request->input('author_datebirth'),
            'author_gender' => $request->input('author_gender'),
            'author_religion' => $request->input('author_religion'),

            // KONTAK DARUTAT
            'author_mother' => $request->input('author_mother'),
            'author_phonemother' => $request->input('author_phonemother'),
            'author_father' => $request->input('author_father'),
            'author_phonefather' => $request->input('author_phonefather'),
            'author_wali' => $request->input('author_wali'),
            'author_phonewali' => $request->input('author_phonewali'),

        ]);

        return redirect()->route('author.profile.index')->with('success', 'Data berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
