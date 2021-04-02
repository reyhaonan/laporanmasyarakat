<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use App\Models\Tanggapan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

use PDF;

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
        $pengaduan = Pengaduan::where('status','proses')->orderBy('created_at','desc')->get();
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


    public function createPetugas(Request $request){
        $foto_url = $request->file('foto')->store('images','public');
        User::create([
            'nama' => $request->nama,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'level' => 'petugas',
            'foto' => $foto_url
        ]);
        return redirect()->back();
    }

    public function updateUser(Request $request,$id){
        $user = User::find($id);
        if($request->file('foto')){
            if($user->foto != 'images/default.jpg'){
                Storage::delete('public/'.$user->foto);
            }
            $foto_url = $request->file('foto')->store('images','public');
            $user->update([
                'nama' => $request->nama,
                'username' => $request->username,
                'alamat' => $request->alamat,
                'nik' => $request->nik,
                'notelp' => $request->notelp,
                'foto' => $foto_url
                ]);
        }else{
            $user->update([
                'nama' => $request->nama,
                'username' => $request->username,
                'alamat' => $request->alamat,
                'nik' => $request->nik,
                'notelp' => $request->notelp,
                ]);
        }
                return redirect()->back();
    }
    public function deleteUser($id){
        $user = User::find($id);
        if($user->foto != 'images/default.jpg'){
            Storage::delete('public/'.$user->foto);
        }
        $user->delete();
        return redirect()->back();
    }




    public function cetakPdf(){
        $pengaduan = Pengaduan::all();

    	$pdf = PDF::loadview('pengaduan_pdf',['pengaduan'=>$pengaduan]);
    	return $pdf->download('laporan-pengaduan-'.date("dmY").'.pdf');
    }
}
