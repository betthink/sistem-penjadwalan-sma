<?php

namespace App\Http\Controllers;

use App\Models\M_guru;
use App\Models\M_kelas;
use App\Models\M_mp;

class dashboardController extends Controller
{
    //
    public function index()
    {
        $title = 'Dashboard'; // Mengisi variabel $username dengan nilai 'admin'
        $gurus = M_guru::paginate(100);
        $kelases = M_kelas::paginate(100);
        $mapels = M_mp::paginate(100);
        return view('admin.home.dashboard', compact('title', 'gurus', 'kelases', 'mapels'));
    }
}
