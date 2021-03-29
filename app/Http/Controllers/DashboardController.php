<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use App\Models\Tanggapan;
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
        $pengaduan = Pengaduan::where('status','proses')->orderBy('created_at','asc')->take(3)->get();
        return view('dashboard',['pengaduan' => $pengaduan]);
    }
    public function petugas()
    {
        $petugas = User::where('level','petugas')->paginate(10);
        return view('petugas',["petugas" => $petugas]);
    }
    public function masyarakat()
    {
        $masyarakat = User::where('level','masyarakat')->paginate(10);
        // dd($masyarakat);
        return view('masyarakat',['masyarakat' => $masyarakat]);
    }
    public function pengaduan()
    {
        $pengaduan = Pengaduan::orderBy('created_at','desc')->paginate(10);
        return view('pengaduan',['pengaduan' => $pengaduan]);
    }
    public function tanggapan()
    {
        $tanggapan = Tanggapan::orderBy('created_at','desc')->paginate(10);
        return view('tanggapan',['tanggapan' => $tanggapan]);
    }
}
