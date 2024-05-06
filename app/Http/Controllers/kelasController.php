<?php

namespace App\Http\Controllers;

use App\Models\M_guru;
use App\Models\M_kelas;
use Illuminate\Http\Request;

class kelasController extends Controller
{
    //
    public function index()
    {
        $title = 'Master kelas'; // Mengisi variabel $username dengan nilai 'admin'
        $kelases = M_kelas::paginate(5);
        // dd($kelases);
        $gurus = M_guru::all();
        return view('admin.kelas.index', compact('title', 'kelases', 'gurus'));
    }
    public function tambah()
    {
        $title = 'Master kelas';
        $gurus = M_guru::all();
        return view('admin.kelas.tambah', compact('title', 'gurus'));
    }
    public function create(Request $request)
    {
        // Validasi data yang diterima dari form
        $validatedData = $request->validate([
            'tingkatan' => 'required|string|max:255',
            'jurusan' => 'required|string|max:50',
            'nomor_kelas' => 'required|string|max:50',
            'wali_kelas' => 'required|string|max:50|',
        ]);
        // Jika validasi gagal, kembali ke halaman sebelumnya dengan pesan kesalahan
        // if ($validatedData->fails()) {
        //     return redirect()->back()->withErrors($validatedData)->withInput();
        // }

        // Simpan data kelas baru ke dalam database
        $kelas = new M_kelas();
        $kelas->tingkatan = $request->tingkatan;
        $kelas->jurusan = $request->jurusan;
        $kelas->nomor_kelas = $request->nomor_kelas;
        $kelas->wali_kelas = $request->wali_kelas;
        $kelas->save();

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
        $gurus = M_guru::all();
        return view('admin.kelas.edit', compact('title', 'kelas', 'gurus'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'jurusan' => 'required|string|max:50',
            'tingkatan' => 'required|string|max:50',
            'nomor_kelas' => 'required|string|max:50',
            'wali_kelas' => 'required|string|max:50',
        ]);
        $kelas = M_kelas::findOrFail($id);
        // Periksa apakah kode_guru yang baru unik jika diubah
        if ($request->kode_guru !== $kelas->kode_guru) {
            $request->validate([
                'wali_kelas' => 'unique:tb_kelas,id_kelas,' . $id,
            ]);
        }

        $kelas->jurusan = $request->jurusan;
        $kelas->tingkatan = $request->tingkatan;
        $kelas->nomor_kelas = $request->nomor_kelas;
        $kelas->wali_kelas = $request->wali_kelas;
        $kelas->save();
        return redirect()->route('kelas')->with('success', 'Data kelas berhasil diperbarui.');
    }
}
