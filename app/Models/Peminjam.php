<?php

namespace App\Models;

use App\Models\Buku;
use App\Models\User;
use App\Models\Kategori;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Peminjam extends Model
{
    use HasFactory;
    protected $fillable=[
    
        'kelas',
        'buku_id',
        'kategori_id',
        'jumlah_peminjaman',
        'tanggal_peminjaman',
        'tanggal_pengembalian',
    ];
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function buku(){
        return $this->belongsTo(Buku::class,'buku_id');
    }

    public function kategori(){
        return $this->belongsTo(Kategori::class,'kategori_id');
    }

    
}
