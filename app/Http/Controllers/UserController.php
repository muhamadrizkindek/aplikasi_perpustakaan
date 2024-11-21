<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Peminjam;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function index(){
        $peminjam=Peminjam::all();

        return view('pages.anggota.peminjaman',compact('peminjam'));
    }

    
}
