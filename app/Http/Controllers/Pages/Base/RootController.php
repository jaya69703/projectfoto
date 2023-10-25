<?php

namespace App\Http\Controllers\Pages\Base;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\WebSetting;
use App\Models\Booking;
use App\Models\{Post, TagsB, CategoryB};
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\Rules\Password;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Mail;
// KELOLA PAKET
use App\Models\Paket;
use App\Models\PaketKategori;


class RootController extends Controller
{
    // PACKAGE MANAGEMENT
    public function package($slug)
    {
        $data['title'] = "AR POTRET";
        $data['menu'] = "Paket";
        $data['submenu'] = "Lihat Paket";
        $data['paket'] = Paket::where('slug', $slug)->first();
        $data['cpaket'] = PaketKategori::all();
        $data['web'] = WebSetting::find(1)->get();

        $userId = Auth::User()->id;

        $data['ubook'] = Booking::whereHas('paket', function ($query) use ($slug) {
            $query->where('slug', $slug);
        })->where('user_id', $userId)->where('book_stat', 7)->get();

        return view('pages.root.root-pages-pdetails', $data);
    }

    public function packageCategory($slug)
    {
        $data['title'] = "AR POTRET";
        $data['menu'] = "Kategori";
        $data['submenu'] = "Lihat Kategori";
        $data['paket'] = Paket::all();
        // $data['paket'] = Paket::whereHas('cpaket', function ($query) use ($slug) {
        //     $query->where('slug', $slug); })->get();
        $data['cpaket'] = PaketKategori::all();

        // dd($data['paket']);



        return view('pages.root.root-pages-projects', $data);
    }









    public function index()
    {
        $data['title'] = "SkyDash";
        $data['menu'] = "Home";
        $data['submenu'] = "Index";
        $data['paket'] = Paket::paginate(6);
        $data['cpaket'] = PaketKategori::all();
        $data['posts'] = Post::latest()->take(6)->get();
        $data['web'] = WebSetting::find(1)->get();

        return view('pages.root.root-index', $data);
    }

    public function about()
    {
        $data['title'] = "SkyDash";
        $data['menu'] = "Home";
        $data['submenu'] = "Tentang Kami";
        $data['users'] = User::where('type', 3)->get();

        return view('pages.root.root-pages-about', $data);
    }

    public function blog()
    {
        $data['title'] = "SkyDash";
        $data['menu'] = "Home";
        $data['submenu'] = "Blog";
        $data['posts'] = Post::latest()->get();

        return view('pages.root.root-pages-blog', $data);
    }

    public function blogsingle($slug)
    {
        $data['title'] = "SkyDash";
        $data['menu'] = "Home";
        $data['submenu'] = "Blog Single Page";
        $data['posts'] = Post::latest()->take(5)->get();
        $data['post'] = Post::where('slug', $slug)->first();
        $data['category'] = Categoryb::all();
        $data['tags'] = TagsB::all();

        return view('pages.root.root-pages-blog-single', $data);
    }
    public function blogcategory(Categoryb $category)
    {
        $data['title'] = "SkyDash";
        $data['menu'] = "Home";
        $data['submenu'] = "Blog Category Page";
        // $data['posts'] = Post::latest()->take(5)->get();
        $data['posts'] = $category->posts()->latest()->get();
        // $data['post'] = Post::where('slug', $slug)->first();
        $data['category'] = Categoryb::all();
        $data['tags'] = TagsB::all();

        return view('pages.root.root-pages-blog', $data);
    }
    public function blogtags(Tagsb $tagsb)
    {
        $data['title'] = "SkyDash";
        $data['menu'] = "Home";
        $data['submenu'] = "Blog Tags Page";
        // $data['posts'] = Post::latest()->take(5)->get();
        $data['posts'] = $tagsb->posts()->latest()->get();
        // $data['post'] = Post::where('slug', $slug)->first();
        $data['category'] = Categoryb::all();
        $data['tags'] = TagsB::all();

        // dd($data['posts']);
        return view('pages.root.root-pages-blog', $data);
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
    public function privacyPolicy()
    {
        $data['title'] = "SkyDash";
        $data['menu'] = "Home";
        $data['submenu'] = "Kebijakan Privasi";

        return view('pages.root.root-pages-privacy-policy', $data);
    }
    public function termsOfServices()
    {
        $data['title'] = "SkyDash";
        $data['menu'] = "Home";
        $data['submenu'] = "Syarat dan Ketentuan";

        return view('pages.root.root-pages-tos', $data);
    }

    public function pdetails($id)
    {
        $data['title'] = "SkyDash";
        $data['menu'] = "Home";
        $data['submenu'] = "Detail Produk";
        $data['users'] = User::where('type', '2')->get();
        $data['paket'] = Paket::findorFail($id);
        $userId = Auth::id();

        // dd($data['ubook']);

        // dd($data['users']);

        return view('pages.root.root-pages-pdetails', $data);
    }

    public function history()
    {
        $data['title'] = "SkyDash";
        $data['menu'] = "Home";
        $data['submenu'] = "Riwayat Pesanan";
        $data['users'] = User::where('type', '2')->get();
        $userId = Auth::user()->id;
        $data['book'] = Booking::where('user_id', $userId)->get();

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

    public function projects()
    {
        $data['title'] = "SkyDash";
        $data['menu'] = "Paket";
        $data['submenu'] = "Daftar Paket";
        $data['paket'] = Paket::all();
        $data['cpaket'] = PaketKategori::all();

        return view('pages.root.root-pages-projects', $data);
    }

    public function services()
    {
        $data['title'] = "SkyDash";
        $data['menu'] = "Home";
        $data['submenu'] = "Layanan Kami";
        // $data['users'] = User::where('type', '2')->get();
        // $data['book'] = Booking::all();

        // dd($data['users']);

        return view('pages.root.root-pages-services', $data);
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
            return redirect()->route('member.book.profile')->with('success', 'Foto berhasil diupdate.');
        }


        return redirect()->route('member.book.profile')->with('success', 'Data berhasil diupdate.');
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

        return redirect()->route('member.book.changepass')->with('status', 'password-updated');
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

        // KIRIM NOTA TRANSAKSI
        $to_email = Auth::user()->email;
        $to_name = Auth::user()->name;
        $subject = '';

        Mail::send('pages.mail.mail-reply', $data, function ($message) use ($to_email, $to_name, $subject) {
            $message->to($to_email, $to_name)
                ->subject($subject);
        });

        return redirect()->route('member.book.history')->with('success', 'Pemesanan sukses!!, Silahkan lakukan pembayaran dan upload bukti pembayaran');
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
            return redirect()->route('member.book.history')->with('success', 'Upload bukti pembayaran berhasil');
        }

    }

}
