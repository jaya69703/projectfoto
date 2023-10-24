<?php

namespace App\Http\Controllers\Pages\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;


class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['title'] = "SkyDash";
        $data['menu'] = "Booking";
        $data['submenu'] = "Data Booking";
        $data['all'] = Booking::all();
        $data['pending'] = Booking::where('book_stat', 0)->get();
        $data['verify'] = Booking::where('book_stat', 1)->get();
        $data['sverify'] = Booking::where('book_stat', 2)->get();

        return view('pages.booking.booking-index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function verifyPayment(Request $request, $id)
    {
        $book = Booking::findorFail($id);
        $book->update(['book_stat' => $request->input('book_stat')]);
        $book->save();

        return back()->with('success', 'Berhasil verifikasi pembayaran');
    }

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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $book = Booking::find($id);
        $book->delete();

        return back()->with('success', 'data berhasil dihapus...');
    }
}
