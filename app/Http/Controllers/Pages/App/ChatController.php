<?php

namespace App\Http\Controllers\Pages\App;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Chat;
use Auth;

class ChatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['title'] = "AR Projects";
        $data['menu'] = "Aplikasi";
        $data['submenu'] = "Chat";
        $userId = Auth::id();
        $data['chat'] = Chat::where('sender_id', $userId)->get();

        return view('pages.app.chat.chat-index', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi permintaan
        $request->validate([
            'receiverId' => 'required', // Pastikan receiverId disertakan
            'message' => 'required' // Pastikan pesan tidak boleh kosong
        ]);

        // Simpan pesan ke dalam database
        $message = new Chat();
        $message->sender_id = auth()->id(); // Atur ID pengguna saat ini
        $message->receiver_id = $request->receiverId; // Ambil receiverId dari permintaan
        $message->message = $request->message; // Ambil pesan dari permintaan
        $message->save();

        // dd($request->all());
        // Berikan respons yang sesuai, misalnya respons JSON atau respons sukses
        return back()->with('success', 'Data berhasil dikirim');
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
        //
    }
}
