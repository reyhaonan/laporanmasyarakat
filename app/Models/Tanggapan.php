<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tanggapan extends Model
{
    use HasFactory;
    protected $table = 'tanggapan';
    protected $guarded = [];

    public function petugas()
    {
        return $this->hasOne(User::class,'id','id_petugas');
    }
    public function pengaduan()
    {
        return $this->belongsTo(Pengaduan::class,'id_pengaduan');
    }
}
