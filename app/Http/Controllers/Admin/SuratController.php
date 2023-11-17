<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Surat;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Redirect;
use Session;


class SuratController extends Controller
{
    public function index()
    {
        $surat = Surat::all();

        return view('admin.surat.index', ['surat' => $surat]);
    }

    
    public function create()
    {
        $kategoriList = Kategori::all();
    
        return view('admin.surat.create', ['kategoriList' => $kategoriList]);
    }
    
    public function store(Request $request)
    {
        $data = $request->all();
    
        $validate = Validator::make($data, [
            'nomor_surat' => ['required', 'string', 'max:255'],
            'id_kategori' => ['required', 'exists:kategori,id_kategori'],
            'judul' => ['required', 'string', 'max:255'],
            'file_surat' => ['required', 'file', 'mimes:pdf'],
        ]);
    
        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate);
            

        }
        if ($request->hasFile('file_surat')) {
            $data['file_surat'] = $request->file('file_surat')->store('assets/file_surat', 'public');

    
        $originalFilename = $request->file_surat->getClientOriginalName();
        $extension = $request->file_surat->getClientOriginalExtension();

        Surat::create([
            'nomor_surat' => $data['nomor_surat'],
            'id_kategori' => $data['id_kategori'],
            'judul' => $data['judul'],
            'waktu_pembuatan' => now()->setTimezone('Asia/Jakarta'),
            'file_surat' => $data['file_surat'] ?? '',
        ]);
    
        return redirect()->route('surat.index')->with('notif', 'Berhasil Disimpan');
    }
}
    
    public function show($id_surat)
{
    $surat = Surat::find($id_surat);

    if (!$surat) {
        return redirect()->route('surat.index')->with('notif', 'Surat tidak ditemukan');
    }

    return view('admin.surat.show', ['surat' => $surat]);
        
    
}
public function unduhArsip($id_surat)
{
    $surat = Surat::find($id_surat);

    if (!$surat) {
        return redirect()->route('surat.index')->with('error', 'Surat tidak ditemukan.');
    }

    $filePath = storage_path('app' . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . $surat->file_surat);

    if (file_exists($filePath)) {
        $originalFilename = pathinfo($surat->file_surat, PATHINFO_FILENAME);
        $cleanedFilename = preg_replace('/[^a-zA-Z0-9_.-]/', '_', $originalFilename);

        return response()->download($filePath, $cleanedFilename . '.' . pathinfo($surat->file_surat, PATHINFO_EXTENSION));
    } else {
        return redirect()->route('surat.index')->with('error', 'File surat tidak ditemukan.');
    }
}




    public function destroy(Surat $surat)
    {
        // Hapus file surat terkait
        Storage::delete($surat->file_surat);

        $surat->delete();

        return redirect()->route('surat.index')
            ->with('notif', 'Surat berhasil dihapus');
    }
    
}
