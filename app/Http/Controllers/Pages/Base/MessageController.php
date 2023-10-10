<?php

namespace App\Http\Controllers\Pages\Base;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Message;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['title'] = 'Skydash';
        $data['menu'] = 'Message';
        $data['submenu'] = 'Index';
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
        $data['menu'] = 'Message';
        $data['submenu'] = 'Show';
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
