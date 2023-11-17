<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class KategoriController extends Controller
{
    public function index()
    {
        $kategori = Kategori::all();

        return view('Admin.Kategori.index', ['kategori' => $kategori]);
    }

    public function create()
    {
        return view('Admin.kategori.create');
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $validate = Validator::make($data, [
            'nama_kategori' => ['required', 'string', 'max:255'],       
            'judul' => ['required', 'string', 'max:255'],
        ]);

        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate);
        }


        Kategori::create([
            'nama_kategori' => $data['nama_kategori'],
            'judul' => $data['judul'],

        ]);
        session()->flash('success', 'Data Tersimpan!');
        return redirect()->route('kategori.index');
    }

    public function edit($id_kategori)
    {
        $kategori = Kategori::where('id_kategori', $id_kategori)->first();
        session()->flash('success', 'Data Tersimpan!');

        return view('Admin.Kategori.edit', ['kategori' => $kategori]);
    }

    public function update(Request $request, $id_kategori)
    {
        $data = $request->all();

        $kategori = kategori::find($id_kategori);

        $kategori->update([
            'nama_kategori' => $data['nama_kategori'],
            'judul' => $data['judul'],

        ]);
        session()->flash('success', 'Data Tersimpan!');

        return redirect()->route('kategori.index')
        ->with('notif', 'berhasil diupdate');
    }

    public function destroy(Kategori $kategori)
    {
        try {
            // Cek apakah ada surat terkait
            $kategori->load('surats');
    
            // Jika ada surat terkait, tampilkan pesan kesalahan
            if ($kategori->surats && $kategori->surats->isNotEmpty()) {
                return redirect()->route('kategori.index')->with('error', 'Kategori tidak dapat dihapus karena memiliki surat terkait.');
            }
    
            // Jika tidak ada surat terkait, hapus kategori
            $kategori->delete();
    
            // Set notifikasi berhasil
            session()->flash('success', 'Data Terhapus!');
        } catch (\Exception $exception) {
            // Tangkap jika terjadi kesalahan lainnya
            return redirect()->route('kategori.index')->with('error', 'Terjadi kesalahan saat menghapus kategori.');
        }
    
        return redirect()->route('kategori.index')->with('notif', 'Kategori berhasil dihapus');
    }
        
}