<?php

namespace App\Http\Controllers;

use App\Models\User;
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
        $petugas = User::where('level','petugas')->paginate(20);
        return view('petugas',["petugas" => $petugas]);
    }
    public function masyarakat()
    {
        return view('masyarakat');
    }
    public function pengaduan()
    {
        return view('pengaduan');
    }
    public function tanggapan()
    {
        return view('tanggapan');
    }
}
