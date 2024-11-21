<?php
namespace App\Models;

use App\Models\Buku;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Peminjam extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'kelas',
        'buku_id',
        'jumlah_peminjaman',
        'tanggal_peminjaman',
        'tanggal_pengembalian',
        'status',
    ];

    // Relasi ke tabel users
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Relasi ke tabel barang
    public function buku()
    {
        return $this->belongsTo(Buku::class, 'buku_id');
    }
}
