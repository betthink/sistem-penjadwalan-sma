<?php

namespace App\Http\Controllers;

use App\Models\M_tahun_akademik;
use Illuminate\Http\Request;

class tahunakademikController extends Controller
{
    //
    public function index()
    {
        $title = 'Halaman pengampu';
        $tahuns = M_tahun_akademik::all()->toArray();
        // Fungsi pembanding untuk mengurutkan berdasarkan tahun_mulai
        usort($tahuns, function ($a, $b) {
            return $a['tahun_mulai'] - $b['tahun_mulai'];
        });

        // dd($tahuns);

        return view('admin.tahun_akademik.index', compact('title', 'tahuns'));
    }
    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'tahun_mulai' => 'required|string|max:50|',
            'tahun_selesai' => 'required|string|max:50|',
        ]);

        // Simpan data guru baru ke dalam database
        $tahun = new M_tahun_akademik();
        $tahun->tahun_mulai = $request->tahun_mulai;
        $tahun->tahun_selesai = $request->tahun_selesai;
        $tahun->save();
        // Jika penyimpanan berhasil, kembalikan respons berhasil
        return redirect()->route('tahun_akademik')->with('success', 'tahun akademik periode  ' . $request->tahun_mulai . '-'  . $request->tahun_selesai . ' berhasil ditambahkan');
    }
    public function delete($id)
    {
        // Temukan guru berdasarkan ID
        $tahun = M_tahun_akademik::findOrFail($id);
        // Hapus guru
        $tahun->delete();

        // Simpan pesan berhasil ke dalam session
        return redirect()->back()->with('success', 'Tahun akademik periode ' . $tahun->tahun_mulai . '-' . $tahun->tahun_selesai .  ' telah dihapus');
    }
}
