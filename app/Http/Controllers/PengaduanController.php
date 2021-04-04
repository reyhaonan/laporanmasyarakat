<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PengaduanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengaduan = Pengaduan::where('id_pelapor',Auth::id())->orderBy('created_at','desc')->paginate(4);
        return view('daftarpengaduan',['pengaduan' => $pengaduan]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('laporan');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->file('foto')){
            $foto_url = $request->file('foto')->store('images','public');
            Pengaduan::create([
                'isi_laporan' => $request->isi_laporan,
                'id_pelapor' => Auth::id(),
                'foto' => $foto_url,
            ]);
            return redirect()->back()->with('message', 'Laporan berhasil ditambahkan!');
        }else{
            Pengaduan::create([
                'isi_laporan' => $request->isi_laporan,
                'id_pelapor' => Auth::id(),
            ]);
            return redirect()->back()->with('message', 'Laporan berhasil ditambahkan!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pengaduan  $pengaduan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Storage::delete('public/'.Pengaduan::find($id)->foto);
        Pengaduan::find($id)->delete();
        return redirect()->back();
    }
}
