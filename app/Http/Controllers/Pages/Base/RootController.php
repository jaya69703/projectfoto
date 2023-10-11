<?php

namespace App\Http\Controllers\Pages\Base;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Paket;
use App\Models\WebSetting;
use App\Models\Booking;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\Rules\Password;
use App\Rules\MatchOldPassword;

class RootController extends Controller
{
    public function index()
    {
        $data['title'] = "SkyDash";
        $data['menu'] = "Home";
        $data['submenu'] = "Index";
        $data['paket'] = Paket::all();
        $data['web'] = WebSetting::find(1)->get();

        return view('pages.root.root-index', $data);
    }

    public function about()
    {
        $data['title'] = "SkyDash";
        $data['menu'] = "Home";
        $data['submenu'] = "Tentang Kami";
        $data['users'] = User::where('type', '2')->get();

        // dd($data['users']);

        return view('pages.root.root-pages-about', $data);
    }

    public function contact()
    {
        $data['title'] = "SkyDash";
        $data['menu'] = "Home";
        $data['submenu'] = "Kontak Kami";
        $data['users'] = User::where('type', '2')->get();

        // dd($data['users']);

        return view('pages.root.root-pages-contact', $data);
    }

    public function pdetails($id)
    {
        $data['title'] = "SkyDash";
        $data['menu'] = "Home";
        $data['submenu'] = "Detail Produk";
        $data['users'] = User::where('type', '2')->get();
        $data['paket'] = Paket::findorFail($id);
        $userId = Auth::id();
        $data['ubook'] = Booking::where('user_id', $userId)->get();


        // dd($data['users']);

        return view('pages.root.root-pages-pdetails', $data);
    }

    public function history()
    {
        $data['title'] = "SkyDash";
        $data['menu'] = "Home";
        $data['submenu'] = "Riwayat Pesanan";
        $data['users'] = User::where('type', '2')->get();
        $data['book'] = Booking::all();
        $userId = Auth::user()->id;

        // dd($data['users']);

        return view('pages.root.root-pages-history', $data);
    }

    public function profile()
    {
        $data['title'] = "SkyDash";
        $data['menu'] = "Home";
        $data['submenu'] = "Profile Pengguna";
        // $data['users'] = User::where('type', '2')->get();
        // $data['book'] = Booking::all();

        // dd($data['users']);

        return view('pages.root.root-pages-profile', $data);
    }

    public function updateUser(Request $request)
    {
        $userId = Auth::id();
        $user = User::findOrFail($userId); // Memanggil 'firstOrFail()' untuk mendapatkan objek user

        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
        ]);

        Auth()->user()->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
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
            return redirect()->route('user.book.profile')->with('success', 'Foto berhasil diupdate.');
        }


        return redirect()->route('user.book.profile')->with('success', 'Data berhasil diupdate.');
    }

    public function updatePass(Request $request)
    {
        $validated = $request->validateWithBag('updatePassword', [
            'current_password' => ['required', 'current_password'],
            'password' => ['required', Password::defaults(), 'confirmed'],
        ]);

        $request->user()->update([
            'password' => Hash::make($validated['password']),
        ]);

        return redirect()->route('user.book.changepass')->with('status', 'password-updated');
    }

    public function booknow(Request $request)
    {
        $request->validate([
            'book_date' => 'required',
            'book_time' => 'required',
            'book_note' => 'required',
        ]);
        $book = new Booking;
        $book->user_id = Auth::user()->id;
        $book->paket_id = $request->paket_id;
        $book->book_date = $request->book_date;
        $book->book_time = $request->book_time;
        $book->book_note = $request->book_note;

        $book->save();

        return redirect()->route('user.book.history')->with('success', 'Pemesanan sukses!!, Silahkan lakukan pembayaran dan upload bukti pembayaran');
    }

    public function uploadProof(Request $request, $id)
    {
        $request->validate([
            'book_prof' => 'required',
        ]);
        $book = Booking::find($id);
        if($request->hasFile('book_prof')){
            $oldPhoto = $book->book_prof;

            if ($oldPhoto !== 'default.png' && Storage::disk('public')->exists('images/prof/' . $oldPhoto)) {
                Storage::disk('public')->delete('images/web/' . $oldPhoto);
            }

            $filename = $request->book_prof->getClientOriginalName();
            $request->book_prof->storeAs('images/prof/', $filename, 'public');
            $book->book_prof = $filename;
            $book->book_stat = 1;

            $book->save();
            // Auth()->web()->update(['image'=>$filename]);
            // return redirect()->route('admin.app.setting.index')->with('success', 'Foto berhasil diupdate.');
            return redirect()->route('user.book.history')->with('success', 'Upload bukti pembayaran berhasil');
        }

    }

}
