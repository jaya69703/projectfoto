<?php

namespace App\Http\Controllers\Pages\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Booking;
use App\Models\Paket;
use Auth;
use Pdf;

class SAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['title'] = 'SKydash';
        $data['menu'] = 'Home';
        $data['submenu'] = 'Dashboard';

        $income = Booking::where('book_stat', 7)
        ->join('pakets', 'bookings.paket_id', '=', 'pakets.id')
        ->sum('pakets.price');

        $bookdone = Booking::where('book_stat', 7)->latest()->get(); // Ambil semua booking dengan book_stat 7
        $bookon = Booking::where('book_stat', [2,])->latest()->get(); // Ambil semua booking dengan book_stat 7
        $member = User::where('type', 0)->latest()->get(); // Ambil semua booking dengan book_stat 7
        $books = Booking::where('book_stat', 7)->get(); // Ambil semua booking dengan book_stat 7

        $pakets = Paket::whereIn('id', $books->pluck('paket_id'))->get(); // Ambil data paket yang terkait dengan booking

        $formattedIncome = number_format($income, 0, ',', '.');


        // dd($formattedIncome);

        // Mengirim data ke view
        // dd($member);
        return view('base.base-home', $data, compact('books', 'bookon','bookdone', 'member', 'pakets', 'income', 'formattedIncome'));
    }

    public function cetakDataTransaksi()
    {
        $data['title'] = 'SKydash';
        $data['menu'] = 'Home';
        $data['submenu'] = 'Profile';
        $data['book'] = Booking::where('book_stat', 7)->get();
        $data['income'] = Booking::where('book_stat', 7)
        ->join('pakets', 'bookings.paket_id', '=', 'pakets.id')
        ->sum('pakets.price');

        $pdf = PDF::loadView('pages.print.print-book-success', $data);

        return $pdf->download('report-booking.pdf');
        // return view('base.base-profile', $data);
    }

    public function show()
    {
        $data['title'] = 'SKydash';
        $data['menu'] = 'Home';
        $data['submenu'] = 'Profile';

        return view('base.base-profile', $data);
    }
    public function memberAll()
    {
        $data['title'] = 'SKydash';
        $data['menu'] = 'Rekap Data';
        $data['submenu'] = 'Data Member';
        $member = User::where('type', 0)->latest()->get();

        // dd($member);
        return view('pages.rekap.rekap-member-all', $data, compact('member'));
    }

    public function memberFilter(Request $request)
    {
        $data['title'] = 'SKydash';
        $data['menu'] = 'Rekap Data';
        $data['submenu'] = 'Data Member';
        $month = $request->get('month');

        $member = User::whereMonth('created_at', '=', $month)->get();

        return view('pages.rekap.rekap-member-all', $data, compact('member'));
    }

    public function transAll()
    {
        $data['title'] = 'SKydash';
        $data['menu'] = 'Rekap Data';
        $data['submenu'] = 'Data Transaksi';
        $transaksi = Booking::all();

        return view('pages.rekap.rekap-trans-all', $data, compact('transaksi'));
    }
    public function printReportMember($month = null, $format = 'pdf')
    {
        $members = ($month == 'all') ? User::where('type', 0)->get() : User::where('type', 0)->whereMonth('created_at', '=', $month)->get();

        $newMember = ($month == 'all') ? User::where('type', 0)->count() : User::where('type', 0)->whereMonth('created_at', '=', $month)->count();

        $data['newMember'] = $newMember;

        if (count($members) > 0) {
            $pdf = PDF::loadView('pages.print.print-member-success', $data, compact('members', 'month'));
            return $pdf->download('report-member-' . $month . '.' . $format);
        } else {
            return "Tidak ada data yang ditemukan.";
        }
    }


    public function transFilter(Request $request)
    {
        $data['title'] = 'SKydash';
        $data['menu'] = 'Rekap Data';
        $data['submenu'] = 'Data Transaksi';
        $month = $request->get('month');

        $transaksi = Booking::whereMonth('created_at', '=', $month)->get();

        return view('pages.rekap.rekap-trans-all', $data, compact('transaksi'));
    }

    public function printReport($month = null, $format = 'pdf')
    {
        $transaksi = ($month == 'all') ? Booking::all() : Booking::whereMonth('bookings.created_at', '=', $month)->get();

        $data['income'] = ($month == 'all') ? Booking::where('book_stat', 7)->join('pakets', 'bookings.paket_id', '=', 'pakets.id')->sum('pakets.price') : Booking::whereMonth('bookings.created_at', '=', $month)->where('book_stat', 7)->join('pakets', 'bookings.paket_id', '=', 'pakets.id')->sum('pakets.price');

        if (count($transaksi) > 0) {
            $pdf = PDF::loadView('pages.print.print-book-success', $data, compact('transaksi', 'month'));
            return $pdf->download('report-booking-' . $month . '.' . $format);
        } else {
            return "Tidak ada data yang ditemukan.";
        }
    }



    public function update(Request $request)
    {
        $userId = Auth::id();
        $user = User::findOrFail($userId); // Memanggil 'firstOrFail()' untuk mendapatkan objek user

        $request->validate([
            'name' => 'required',
        ]);

        Auth()->user()->update([
            'name' => $request->name,
            'email' => $request->email,
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
            return redirect()->route('sadmin.profile.index')->with('success', 'Foto berhasil diupdate.');
        }


        return redirect()->route('sadmin.profile.index')->with('success', 'Data berhasil diupdate.');
    }
}
