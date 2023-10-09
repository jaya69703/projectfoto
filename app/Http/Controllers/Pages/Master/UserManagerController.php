<?php

namespace App\Http\Controllers\Pages\Master;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Worker;
use App\Models\User;
use App\Exports\UsersExport;
use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;

class UserManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['title'] = "SkyDash";
        $data['menu'] = "User Manager";
        $data['submenu'] = "List Users";
        $data['member'] = User::where('type', 0)->get();
        $data['admin'] = User::whereIn('type', [1, 2])->get();

        return view('pages.usermanage.usermanage-index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['title'] = "SkyDash";
        $data['menu'] = "User Manager";
        $data['submenu'] = "Create Users";
        $data['usermanage'] = User::all();

        return view('pages.usermanage.usermanage-create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $code = substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 5); // Generate random 5-letter code

        $request->validate([
            'name' => 'required|max:256',
            'email' => 'required|max:256|email|unique:users',
            'phone' => 'required',
            'type' => 'required|max:8|integer',
        ]);

        $usermanageData = [
            'code' => $code,
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'type' => $request->type,
            'password' => Hash::make($request->input('phone')),
        ];

        DB::table('users')->insert($usermanageData);

        if($request->input('type') == '2') {
            $workerData = [
                'worker_name' => $request->input('name'),
                'worker_email' => $request->input('email'),
                'worker_phone' => $request->input('phone'),
                'code' => $code,
                // 'position_id' => $request->input('position_id'),
                // 'divisi_id' => $request->input('divisi_id'),
            ];

            DB::table('worker')->insert($workerData);

            return redirect()->route('admin.usermanage.user.index')->with('success', 'Data berhasil ditambahkan.');

        }elseif($request->input('type') == '1') {
            $workerData = [
                'worker_name' => $request->input('name'),
                'worker_email' => $request->input('email'),
                'worker_phone' => $request->input('phone'),
                'code' => $code,
                // 'position_id' => $request->input('position_id'),
                // 'divisi_id' => $request->input('divisi_id'),
            ];

            DB::table('worker')->insert($workerData);

            return redirect()->route('admin.usermanage.user.index')->with('success', 'Data berhasil ditambahkan.');

        }elseif($request->input('type') == '0') {
            return redirect()->route('admin.usermanage.user.index')->with('success', 'Data berhasil ditambahkan.');
        }
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
        $data['title'] = "SkyDash";
        $data['menu'] = "User Manager";
        $data['submenu'] = "List Users";
        $data['usermanage'] = User::find($id);

        return view('pages.usermanage.usermanage-edit', $data);


    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::find($id);
        $request->validate([
            'isverify' => 'required|integer'
        ]);

        $user->isverify = $request->isverify;
        $user->save();
        return redirect()->route('admin.usermanage.user.index')->with('success', 'Data berhasil diupdate.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $usermanage = User::find($id);

        $code = $usermanage->code;

        $worker = Worker::where('code', $code)->first();

        $worker->delete();
        $usermanage->delete();

        return redirect()->route('admin.usermanage.user.index')->with('success', 'Data berhasil dihapus.');
    }

    public function Userdestroy(string $id)
    {
        $usermanage = User::find($id);
        $usermanage->delete();

        return redirect()->route('admin.usermanage.user.index')->with('success', 'Data berhasil dihapus.');
    }

    public function exportUser()
    {
        return Excel::download(new UsersExport, 'users.csv');
    }

    public function importUser()
    {
        Excel::import(new UsersImport,request()->file('file'));
        return back();
    }
}
