<?php

namespace App\Http\Controllers;

use App\Models\M_kelas;
use Illuminate\Http\Request;

class kelasController extends Controller
{
    //
    public function index()
    {
        $title = 'Master kelas'; // Mengisi variabel $username dengan nilai 'admin'
        $kelases = M_kelas::all();
        return view('admin.kelas.index', compact('title', 'kelases'));
    }
    public function tambah()
    {
        $title = 'Master kelas';
        return view('admin.kelas.tambah', compact('title'));
    }
    public function create(Request $request)
    {
        // Validasi data yang diterima dari form
        $validatedData = $request->validate([
            'tingkatan' => 'required|string|max:255',
            'jurusan' => 'required|string|max:50',
            'nomor_kelas' => 'required|string|max:50',
            'wali_kelas' => 'required|string|max:50',
        ]);
        // dd($validatedData);

        // Simpan data guru baru ke dalam database
        $guru = new M_kelas();
        $guru->tingkatan = $request->tingkatan;
        $guru->jurusan = $request->jurusan;
        $guru->nomor_kelas = $request->nomor_kelas;
        $guru->wali_kelas = $request->wali_kelas;
        $guru->save();

        // Jika penyimpanan berhasil, kembalikan respons berhasil
        return redirect()->route('kelas')->with('success', 'Data kelas berhasil ditambahkan');
    }
    public function delete($id)
    {
        // Temukan guru berdasarkan ID
        $kelas = M_kelas::findOrFail($id);
        // Hapus kelas
        $kelas->delete();
        // Simpan pesan berhasil ke dalam session
        return redirect()->back()->with('success', 'Data kelas berhasil dihapus');
    }
    public function edit($id)
    {
        $title = 'Master kelas';
        $kelas = M_kelas::findOrFail($id);
        return view('admin.kelas.edit', compact('title', 'kelas'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string',
            'kode_guru' => 'required|string|max:50',
        ]);
        $guru = M_kelas::findOrFail($id);
        // Periksa apakah kode_guru yang baru unik jika diubah
        if ($request->kode_guru !== $guru->kode_guru) {
            $request->validate([
                'id_guru' => 'unique:tb_guru,id_guru,' . $id,
            ]);
        }

        $guru->nama = $request->nama;
        $guru->kode_guru = $request->kode_guru;
        $guru->save();

        return redirect()->route('guru')->with('success', 'Data guru berhasil diperbarui.');
    }
}
