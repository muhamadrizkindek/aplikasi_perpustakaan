<?php

namespace App\Models;

use App\Models\Kategori;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Buku extends Model
{
    use HasFactory;

    protected $fillable=[
        'kategori_id',
        'nama_buku',
        'judul',
        'penulis',
        'penerbit',
        'tahun_terbit',
        'jumlah_tersedia',
    ];

    public function kategori(){
        return $this->belongsTo(Kategori::class,'kategori_id');
    }

    
}
