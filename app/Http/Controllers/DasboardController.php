<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\User;
use App\Models\Kategori;
use App\Models\Peminjam;
use Illuminate\Http\Request;

class DasboardController extends Controller
{
    //
    public function index()
    {
        // Mengambil semua data buku
        $buku = Buku::count();

        // Mengambil semua data peminjam
        $peminjam = Peminjam::count();

        // Mengambil semua data kategori
        $kategori = Kategori::count();

        // Menghitung jumlah user
        $user = User::count();

        // Mengirim data ke view
        return view('pages.dasboard.index', compact('buku', 'peminjam', 'kategori', 'user'));
    }

}
