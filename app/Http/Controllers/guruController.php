<?php

namespace App\Http\Controllers;

use App\Models\guru;
use App\Models\M_guru;
use Illuminate\Http\Request;

class guruController extends Controller
{
    //
    public function index()
    {
        $title = 'Master guru';
        $gurus = M_guru::all();
        return view('admin.guru.index', compact('title', 'gurus'));
    }
}
