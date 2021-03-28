<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('dashboard');
    }
    public function petugas()
    {
        return view('dashboard');
    }
    public function masyarakat()
    {
        return view('dashboard');
    }
    public function pengaduan()
    {
        return view('dashboard');
    }
}
