<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use App\Models\Tanggapan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TanggapanController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Tanggapan::create([
            'tanggapan' => $request->tanggapan,
            'id_petugas' => Auth::id(),
            'id_pengaduan' => $request->id_pengaduan,
        ]);
        Pengaduan::find($request->id_pengaduan)->update([
            'status' => 'selesai'
        ]);
        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tanggapan  $tanggapan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Tanggapan::find($id)->update([
            'tanggapan' => $request->tanggapan
        ]);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tanggapan  $tanggapan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Tanggapan::find($id)->delete();
        return redirect()->back();
    }
}
