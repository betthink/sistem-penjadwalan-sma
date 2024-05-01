<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class dashboardController extends Controller
{
    //
    public function index()
    {
        $title = 'Dashboard'; // Mengisi variabel $username dengan nilai 'admin'

        return view('admin.home.dashboard', compact('title'));
    }
}
