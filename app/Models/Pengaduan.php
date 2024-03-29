<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    use HasFactory;
    protected $table = 'pengaduan';
    protected $guarded = [];

    public function User(){
        return $this->belongsTo(User::class,'id_pelapor');
    }

    public function Tanggapan(){
        return $this->hasOne(Tanggapan::class,'id_pengaduan');
    }
}
