<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
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
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $pengaduan = Pengaduan::where('status','proses')->orderBy('created_at','asc')->take(2)->get();
        return view('dashboard',['pengaduan' => $pengaduan]);
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
