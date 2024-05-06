<?php

namespace App\Http\Controllers;

use App\Models\M_mp;
use Illuminate\Http\Request;

class mpController extends Controller
{
    //
    public function index()
    {
        $title = 'Master Mapel';
        $mps = M_mp::paginate(5);
        return view('admin.mata_pelajaran.index', compact('title', 'mps'));
    }
    public function tambah()
    {
        $title = 'Master Mapel';
        return view('admin.mata_pelajaran.tambah', compact('title'));
    }
    public function edit($id)
    {
        $title = 'Master Mapel';
        $mp = M_mp::findOrFail($id);
        return view('admin.mata_pelajaran.edit', compact('title', 'mp'));
    }
    public function create(Request $request)
    {
        // Validasi data yang diterima dari form
        $validatedData = $request->validate([
            'nama_mp' => 'required|string|max:50',
            'kode_mp' => 'required|string|max:50',
            
        ]);
        // dd($validatedData);

        // Simpan data guru baru ke dalam database
        $mp = new M_mp();
        $mp->nama_mp = $request->nama_mp;
        $mp->kode_mp = $request->kode_mp;
        $mp->save();

        // Jika penyimpanan berhasil, kembalikan respons berhasil
        return redirect()->route('mapel')->with('success', 'Mapel ' . $request->nama_mp .' berhasil ditambahkan');
    }
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama_mp' => 'required|string|max:50',
            'kode_mp' => 'required|string|max:50',

        ]);
        $mp = M_mp::findOrFail($id);
        // Periksa apakah kode_guru yang baru unik jika diubah
        if ($request->kode_mp !== $mp->kode_mp) {
            $request->validate([
                'id_mp' => 'unique:tb_mp,id_mp,' . $id,
            ]);
        }

        $mp->nama_mp = $request->nama_mp;
        $mp->kode_mp = $request->kode_mp;
        $mp->save();

        return redirect()->route('mapel')->with('success', 'Mapel berhasil diperbarui.');
    }
    public function delete($id)
    {
        // Temukan guru berdasarkan ID
        $mp = M_mp::findOrFail($id);
        // Hapus mp
        $mp->delete();
        // Simpan pesan berhasil ke dalam session
        return redirect()->back()->with('success', 'Mapel ' . $mp->nama_mp .  ' telah dihapus');
    }
}
