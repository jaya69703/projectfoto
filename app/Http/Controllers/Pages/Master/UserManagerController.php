<?php

namespace App\Http\Controllers\Pages\Master;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\Author;
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
        $data['menu'] = "Kelola Pengguna";
        $data['submenu'] = "Pengguna";
        $data['member'] = User::where('type', 0)->get();
        $data['memplus'] = User::where('type', 1)->get();
        $data['author'] = User::where('type', 2)->get();
        $data['admin'] = User::where('type', 3)->get();

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

    public function show($id)
    {
        $data['title'] = "SkyDash";
        $data['menu'] = "User Manager";
        $data['submenu'] = "Create Users";
        $data['user'] = User::findOrFail($id);
        // $data['ip'] = '47.250.55.111'; //Static IP address get
        $data['ip'] = request()->ip(); //Dynamic IP address get
        $data['locate'] = \Location::get($data['ip']);

        // dd($data['locate']);
        return view('pages.usermanage.usermanage-show', $data);
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
            'isverify' => 1,
            'password' => Hash::make($request->input('phone')),
        ];

        DB::table('users')->insert($usermanageData);

        // JIKA INPUT TYPE 1 ATAU MEMBER PLUS
        if($request->input('type') == '1') {
            $memberData = [
                'member_name' => $request->input('name'),
                'member_email' => $request->input('email'),
                'member_phone' => $request->input('phone'),
                'code' => $code,
            ];

            DB::table('members')->insert($memberData);

            return redirect()->route('admin.usermanage.memberplus')->with('success', 'Data berhasil ditambahkan.');

        // JIKA INPUT TYPE 2 ATAU AUTHOR
        }elseif($request->input('type') == '2') {
            $authorData = [
                'author_name' => $request->input('name'),
                'author_email' => $request->input('email'),
                'author_phone' => $request->input('phone'),
                'code' => $code,
            ];

            DB::table('authors')->insert($authorData);

            return redirect()->route('admin.usermanage.author')->with('success', 'Data berhasil ditambahkan.');

        // JIKA INPUT TYPE 0 ATAU SEKEDAR MEMBER BIASA
        }elseif($request->input('type') == '0') {
            return redirect()->route('admin.usermanage.member')->with('success', 'Data berhasil ditambahkan.');
        // JIKA INPUT TYPE 3 ATAU AKUN ADMIN
        }elseif($request->input('type') == '3') {
            return redirect()->route('admin.usermanage.admin')->with('success', 'Data berhasil ditambahkan.');
        }
    }

    public function edit(string $id)
    {
        $data['title'] = "SkyDash";
        $data['menu'] = "Kelola Pengguna";
        $data['submenu'] = "Edit Pengguna";
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
    public function memberplusdestroy(string $id)
    {
        $usermanage = User::find($id);
        $code = $usermanage->code;
        $memberplus = Member::where('code', $code)->first();
        $memberplus->delete();
        $usermanage->delete();

        return redirect()->route('admin.usermanage.admin')->with('success', 'Data berhasil dihapus.');
    }

    public function authordestroy(string $id)
    {
        $usermanage = User::find($id);
        $code = $usermanage->code;
        $author = Author::where('code', $code)->first();
        $author->delete();
        $usermanage->delete();

        return redirect()->route('admin.usermanage.admin')->with('success', 'Data berhasil dihapus.');
    }

    public function destroy(string $id)
    {
        $usermanage = User::find($id);
        $usermanage->delete();

        return redirect()->route('admin.usermanage.member')->with('success', 'Data berhasil dihapus.');
    }

}
