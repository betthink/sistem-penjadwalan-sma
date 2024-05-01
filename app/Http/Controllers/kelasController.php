<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class kelasController extends Controller
{
    //
    public function index()
    {
        $title = 'Master kelas'; // Mengisi variabel $username dengan nilai 'admin'
        return view('admin.home.dashboard', compact('title'));
    }
}
