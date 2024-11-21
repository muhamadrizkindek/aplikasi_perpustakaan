<?php

namespace App\Models;

use App\Models\Buku;
use App\Models\Peminjam;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kategori extends Model
{
    use HasFactory;
    protected $fillable=[
        'namakategori',
        'deskripsi',
    ];

    public function buku(){
        return $this->hasMany(Buku::class);
    }
    public function peminjam(){
        return $this->hasMany(Peminjam::class);
    }
}
