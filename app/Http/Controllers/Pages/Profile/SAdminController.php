<?php

namespace App\Http\Controllers\Pages\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Booking;
use Illuminate\Support\Facades\URL;
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

        $bookdone = Booking::whereIn('book_stat', [2,4,5,6,7])->latest()->get(); // Ambil semua booking dengan book_stat 7
        $bookon = Booking::whereIn('book_stat', [2,4,5,6,7])->latest()->get(); // Ambil semua booking dengan book_stat 7
        $member = User::where('type', 0)->latest()->paginate(10); // Ambil semua booking dengan book_stat 7
        $books = Booking::whereIn('book_stat', [2,4,5,6,7])->get(); // Ambil semua booking dengan book_stat 7

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
    public function memberAll(Request $request)
    {
        $data['title'] = 'SKydash';
        $data['menu'] = 'Rekap Data';
        $data['submenu'] = 'Data Member';
        if($request->filled('search')){
            // $users = User::search($request->search)->get();
            $member = User::search($request->search)->where('type', 0)->get();
        }else{
            $member = User::where('type', 0)->latest()->get();
            // $users = User::get();
        }

        // dd($member);
        return view('pages.rekap.rekap-member-all', $data, compact('member'));
    }

    public function memberFilter(Request $request)
    {
        $data['title'] = 'SKydash';
        $data['menu'] = 'Rekap Data';
        $data['submenu'] = 'Data Member';
        $month = $request->get('month');

        $member = ($month == 'all') ? User::where('type', 0)->get() : User::whereMonth('created_at', '=', $month)->get();

        return view('pages.rekap.rekap-member-all', $data, compact('member'));
    }

    public function transAll(Request $request)
    {
        $data['title'] = 'SKydash';
        $data['menu'] = 'Rekap Data';
        $data['submenu'] = 'Data Transaksi';
        // $transaksi = Booking::all();

        if ($request->filled('search')) {
            $keyword = $request->search;
            $transaksi = Booking::whereHas('user', function ($query) use ($keyword) {
                $query->where('name', 'like', '%'.$keyword.'%');
            })
            ->orWhereHas('paket', function ($query) use ($keyword) {
                $query->where('name', 'like', '%'.$keyword.'%')
                      ->orWhere('price', 'like', '%'.$keyword.'%');
            })->get();
        } else {
            $transaksi = Booking::all();
        }

        return view('pages.rekap.rekap-trans-all', $data, compact('transaksi'));
    }
    public function printReportMember($month = null, $format = 'pdf')
    {
        $members = ($month == 'all') ? User::where('type', 0)->get() : User::where('type', 0)->whereMonth('created_at', '=', $month)->get();

        $newMember = ($month == 'all') ? User::where('type', 0)->count() : User::where('type', 0)->whereMonth('created_at', '=', $month)->count();

        $data['newMember'] = $newMember;

        if (count($members) > 0) {
            $pdf = PDF::loadView('pages.print.print-member-success', $data, compact('members', 'month'));
            return $pdf->download('Laporan-Data-Member-Bulan-' . $month . '.' . $format);
        } else {
            return "Tidak ada data yang ditemukan.";
        }
    }
    public function printReportMemberAll($format = 'pdf')
    {
        $members = User::where('type', 0)->get();

        $newMember = User::where('type', 0)->count();

        $data['newMember'] = $newMember;

        if (count($members) > 0) {
            $pdf = PDF::loadView('pages.print.print-member-all-success', $data, compact('members'));
            return $pdf->download('Laporan-Data-Semua-Member' . '.' . $format);
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
        $transaksi = ($month == 'all') ? Booking::all() : Booking::whereMonth('created_at', '=', $month)->get();

        return view('pages.rekap.rekap-trans-all', $data, compact('transaksi'));
    }

    public function printReport($month = null, $format = 'pdf')
    {
        $transaksi = ($month == 'all') ? Booking::all() : Booking::whereMonth('bookings.created_at', '=', $month)->get();

        $data['income'] = ($month == 'all') ? Booking::whereIn('book_stat', [2,4,5,6,7])->join('pakets', 'bookings.paket_id', '=', 'pakets.id')->sum('pakets.price') : Booking::whereMonth('bookings.created_at', '=', $month)->whereIn('book_stat', [2,4,5,6,7])->join('pakets', 'bookings.paket_id', '=', 'pakets.id')->sum('pakets.price');

        if (count($transaksi) > 0) {
            $pdf = PDF::loadView('pages.print.print-book-success', $data, compact('transaksi', 'month'));
            return $pdf->download('Laporan-Data-Transaksi-Bulan-' . $month . '.' . $format);
        } else {
            return "Tidak ada data yang ditemukan.";
        }
    }

    public function printReportAll($format = 'pdf')
    {
        $transaksi = Booking::all();

        $data['income'] = Booking::whereIn('book_stat', [2,4,5,6,7])->join('pakets', 'bookings.paket_id', '=', 'pakets.id')->sum('pakets.price');

        if (count($transaksi) > 0) {
            $pdf = PDF::loadView('pages.print.print-book-all-success', $data, compact('transaksi'));
            return $pdf->download('Laporan-Data-Semua-Transaksi-' . '.' . $format);
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
