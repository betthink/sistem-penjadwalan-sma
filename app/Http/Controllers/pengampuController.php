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
        $pengampu = M_pengampu::paginate(5);
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
            'mata_pelajaran' => 'required|string|max:50|',
            'guru' => 'required|string|max:50|',
            'kelas' => 'required|string|max:50|',
            'tahun_akademik' => 'required|string|max:50|',
        ]);
        // Simpan data guru baru ke dalam database
        $datapengampu = new M_pengampu();
        $datapengampu->mata_pelajaran = $request->mata_pelajaran;
        $datapengampu->guru = $request->guru;
        $datapengampu->kelas = $request->kelas;
        $datapengampu->tahun_akademik = $request->tahun_akademik;
        $datapengampu->save();
        // Jika penyimpanan berhasil, kembalikan respons berhasil
        return redirect()->route('pengampu')->with('success', 'Data pengampu berhasil ditambahkan');
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
