<?php

namespace App\Http\Controllers\Pages\Base;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\WebSetting;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\View;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['title'] = 'Skydash';
        $data['menu'] = 'Kelola Pesan';
        $data['submenu'] = 'Daftar Pesan';
        $data['message'] = Message::all();

        return view('pages.message.message-index', $data);
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
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'message' => 'required',
        ]);
        $msg = new Message;

        $msg->name = $request->name;
        $msg->email = $request->email;
        $msg->subject = $request->subject;
        $msg->message = $request->message;
        $msg->save();

        return redirect()->route('root.pages.contact')->with('success', 'Form berhasil dikirim');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data['title'] = 'Skydash';
        $data['menu'] = 'Kelola Pesan';
        $data['submenu'] = 'Lihat Pesanan';
        $data['message'] = Message::findorFail($id);

        return view('pages.message.message-show', $data);
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
    public function kirimBalas(Request $request, $id)
    {
        $data['client'] = Message::findorFail($id);
        $data['web'] = WebSetting::findorFail($id);
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['subject'] = $request->subject;
        $data['desc'] = $request->message;
        // dd($request->all());

        // Mail::send('pages.mail.mail-reply', $data, function($message) use ($request) {
        //     $message->to($request->email)->subject($request->subject);
        // });

        $to_email = $request->email;
        $to_name = $data['name'];
        $subject = 'Reply';

        Mail::send('pages.mail.mail-reply', $data, function ($message) use ($to_email, $to_name, $subject) {
            $message->to($to_email, $to_name)
                ->subject($subject);
        });
        // return 'Email sent at ' . now();

        return redirect()->route('admin.message.index')->with('success', 'Pesan berhasil dikirim');
    }

    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $msg = Message::findorFail($id);
        $msg->delete();

        return redirect()->route('admin.message.index')->with('success', 'Pesan masuk berhasil dihapus.');
    }
}
