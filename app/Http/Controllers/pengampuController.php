<?php

namespace App\Http\Controllers;

use App\Models\M_guru;
use App\Models\M_kelas;
use App\Models\M_mp;
use App\Models\M_pengampu;
use App\Models\M_tahun_akademik;
use Illuminate\Http\Request;

class pengampuController extends Controller
{
    //
    public function index()
    {
        $title = 'Halaman pengampu';
        $pengampu = M_pengampu::all();
        $mapels = M_mp::all();
        $gurus = M_guru::all();
        $kelases = M_kelas::all();
        $tahuns = M_tahun_akademik::all()->toArray();
        // Fungsi pembanding untuk mengurutkan berdasarkan tahun_mulai
        usort($tahuns, function ($a, $b) {
            return $a['tahun_mulai'] - $b['tahun_mulai'];
        });
        // dd($mapels);
        return view('admin.pengampu.index', compact('title', 'pengampu', 'mapels', 'gurus', 'kelases', 'tahuns'));
    }
    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'jam_mulai' => 'required|string|max:50|',
            'jam_selesai' => 'required|string|max:50|',
        ]);

        // Simpan data guru baru ke dalam database
        $jam = new M_pengampu();
        $jam->jam_mulai = $request->jam_mulai;
        $jam->jam_selesai = $request->jam_selesai;
        $jam->save();
        // Jika penyimpanan berhasil, kembalikan respons berhasil
        return redirect()->route('jam')->with('success', 'Jam  ' . $request->jam_mulai . '-'  . $request->jam_selesai . ' berhasil ditambahkan');
    }
    public function delete($id)
    {
        // Temukan guru berdasarkan ID
        $jam = M_pengampu::findOrFail($id);
        // Hapus guru
        $jam->delete();

        // Simpan pesan berhasil ke dalam session
        return redirect()->back()->with('success', 'Jam ' . $jam->jam_mulai . '-' . $jam->jam_selesai .  ' telah dihapus');
    }
}
