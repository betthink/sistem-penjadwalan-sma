<?php

namespace App\Http\Controllers;

use App\Models\M_hari;
use Illuminate\Http\Request;

class hariController extends Controller
{
    //
    public function index()
    {
        $title = 'Halaman Hari';
        $days = M_hari::all();
        return view('admin.hari.index', compact('title', 'days'));
    }
    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'hari' => 'required|string|max:50|unique:tb_hari',
        ]);

        // Simpan data guru baru ke dalam database
        $hari = new M_hari();
        $hari->hari = $request->hari;
        $hari->save();
        // Jika penyimpanan berhasil, kembalikan respons berhasil
        return redirect()->route('hari')->with('success', 'Hari  ' . $request->hari . ' berhasil ditambahkan');
    }
    public function delete($id)
    {
        // Temukan guru berdasarkan ID
        $hari = M_hari::findOrFail($id);
        // Hapus guru
        $hari->delete();

        // Simpan pesan berhasil ke dalam session
        return redirect()->back()->with('success', 'Hari ' . $hari->hari . ' telah dihapus');
    }
   
}
