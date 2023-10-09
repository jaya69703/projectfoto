<?php

namespace App\Http\Controllers\Pages\Base;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tasks;
use Auth;
use Illuminate\Validation\Rule;



class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['title'] = "SkyDash";
        $data['menu'] = "Application";
        $data['submenu'] = "Todo";
        $data['todo'] = Tasks::all();

        return view('pages.app.todo.todo-index', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'desc' => 'required',
            'end_date' => 'required',
            'status' => 'required',
        ]);

        $todo = new Tasks;
        $todo->title = $request->title;
        $todo->desc = $request->desc;
        $todo->end_date = $request->end_date;
        $todo->status = $request->status;
        $todo->user_id = Auth::user()->id;
        $todo->save();

        return back()->with('success', 'Data berhasil ditambahkan...');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'desc' => 'required',
            'end_date' => 'required',
            'status' => ['required', Rule::in(['Pending', 'Success', 'OnProgress'])],
        ]);

        $todo = Tasks::find($id);
        $todo->title = $request->title;
        $todo->desc = $request->desc;
        $todo->end_date = $request->end_date;
        $todo->status = $request->status;
        $todo->user_id = Auth::user()->id;
        $todo->save();

        return back()->with('success', 'Data berhasil diupdate...');
    }

    public function destroy($id)
    {
        $todo = Tasks::find($id);
        $todo->delete();

        return back()->with('success', 'Data berhasil dihapus...');
    }

}
