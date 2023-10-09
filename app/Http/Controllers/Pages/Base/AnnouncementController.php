<?php

namespace App\Http\Controllers\Pages\Base;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Announcement;
use Auth;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;


class AnnouncementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['title'] = "SkyDash";
        $data['menu'] = "Application";
        $data['submenu'] = "Announcement";
        $data['announ'] = Announcement::all();

        return view('pages.app.announ.announ-index', $data);
    }

    public function show($id)
    {
        $data['title'] = "SkyDash";
        $data['menu'] = "Notify Pages";
        $data['submenu'] = "Announcement";
        $data['announ'] = Announcement::find($id);

        return view('pages.app.announ.announ-show', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'desc' => 'required',
            'attach' => 'nullable|mimes:pdf|max:10000', // Validasi file PDF maksimal 10MB
            'exp_date' => 'required',
            'status' => 'required',
        ]);

        $announ = new Announcement;
        $announ->title = $request->title;
        $announ->desc = $request->desc;
        $announ->exp_date = $request->exp_date;
        $announ->status = $request->status;
        $announ->user_id = Auth::user()->id;
        if ($request->hasFile('attach')) {
            $file = $request->file('attach');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = 'attach/pdf/' . $fileName;

            // Simpan file ke storage dengan Storage::disk('public')
            Storage::disk('public')->put($filePath, file_get_contents($file));

            $announ->attach = $filePath;
        }
        $announ->save();

        return back()->with('success', 'Data berhasil ditambahkan...');
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'desc' => 'required',
            'attach' => 'nullable|mimes:pdf|max:10000', // Validasi file PDF maksimal 10MB
            'exp_date' => 'required',
            'status' => 'required',
        ]);

        $announ = Announcement::find($id);
        $announ->title = $request->title;
        $announ->desc = $request->desc;
        $announ->exp_date = $request->exp_date;
        $announ->status = $request->status;
        $announ->user_id = Auth::user()->id;
        if ($request->hasFile('attach')) {
            $file = $request->file('attach');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = 'attach/pdf/' . $fileName;

            // Simpan file ke storage dengan Storage::disk('public')
            Storage::disk('public')->put($filePath, file_get_contents($file));

            $announ->attach = $filePath;
        }
        $announ->save();

        return back()->with('success', 'Data berhasil ditambahkan...');
    }
    public function destroy($id)
    {
        $announ = Announcement::find($id);
        // Cek apakah ada file attachment yang terkait dengan pengumuman
        if (!empty($announ->attach)) {
            // Hapus file attachment dari sistem file
            if (Storage::disk('public')->exists($announ->attach)) {
                Storage::disk('public')->delete($announ->attach);
            }
        }

        $announ->delete();

        return back()->with('success', 'Data berhasil dihapus...');
    }
}
