<?php

namespace App\Http\Controllers;

use App\Models\M_jam;
use Illuminate\Http\Request;

class jamController extends Controller
{
    //
    public function index()
    {
        $title = 'Halaman jam';
        $hours = M_jam::paginate(5);
        foreach ($hours as $hour) {
            $hour->jam_mulai = substr($hour->jam_mulai, 0, 5);
            $hour->jam_selesai = substr($hour->jam_selesai, 0, 5);
        }
        return view('admin.jam.index', compact('title', 'hours'));
    }
    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'jam_mulai' => 'required|string|max:50|',
            'jam_selesai' => 'required|string|max:50|',
        ]);

        // Simpan data guru baru ke dalam database
        $jam = new M_jam();
        $jam->jam_mulai = $request->jam_mulai;
        $jam->jam_selesai = $request->jam_selesai;
        $jam->save();
        // Jika penyimpanan berhasil, kembalikan respons berhasil
        return redirect()->route('jam')->with('success', 'Jam  ' . $request->jam_mulai . '-'  . $request->jam_selesai . ' berhasil ditambahkan');
    }
    public function delete($id)
    {
        // Temukan guru berdasarkan ID
        $jam = M_jam::findOrFail($id);
        // Hapus guru
        $jam->delete();

        // Simpan pesan berhasil ke dalam session
        return redirect()->back()->with('success', 'Jam ' . $jam->jam_mulai . '-' . $jam->jam_selesai .  ' telah dihapus');
    }
}
