<?php
namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\User;
use App\Models\Kategori;
use App\Models\Peminjam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PeminjamController extends Controller
{
    public function index(){
        return view('pages.dasboard.index');
    }

    public function create(){
        $kategoris = Kategori::all();
        $bukus = Buku::all();
        return view('pagesUser.peminjaman.tambah', compact('kategoris', 'bukus'));
    }

    public function storePeminjam(Request $request){
        // Validasi input
        dd($request->all());
        $request->validate([
            'user_id'              => 'required',
            'kelas'                => 'required',
            'buku_id'              => 'required',
            'kategori_id'          => 'required',
            'jumlah_peminjaman'    => 'required|numeric',
            'tanggal_peminjaman'   => 'required|date',
            'tanggal_pengembalian' => 'required|date'
        ], [
            'kelas.required'                => 'Kelas Harus Di isi',
            'buku_id.required'              => 'Buku Harus Di isi',
            'kategori_id.required'          => 'Kategori Harus Di isi',
            'jumlah_peminjaman.required'    => 'Jumlah pinjaman Harus di isi',
            'tanggal_peminjaman.required'   => 'Tanggal Peminjaman Harus di isi',
            'tanggal_pengembalian.required' => 'Tanggal Pengembalian Harus di isi'
        ]);

        // Simpan data ke tabel peminjam
        Peminjam::create([
            'user_id'                => Auth::user()->id,  // Mendapatkan ID pengguna yang sedang login
            'kelas'                  => $request->kelas,
            'buku_id'                => $request->buku_id,
            'kategori_id'            => $request->kategori_id,
            'jumlah_peminjaman'      => $request->jumlah_peminjaman,
            'tanggal_peminjaman'     => $request->tanggal_peminjaman,
            'tanggal_pengembalian'   => $request->tanggal_pengembalian,
            'status'                 => 'belum_dikembalikan'  // Status peminjaman default
        ]);

        // Redirect setelah menyimpan data
        return redirect('/peminjamanku')->with('success', 'Peminjaman berhasil ditambahkan!');
    }

    // Daftar peminjaman yang sudah dilakukan
    public function peminjamanku(Request $request){
        $peminjams = Peminjam::where('user_id', Auth::id())->get(); // Filter berdasarkan user yang sedang login
        return view('pagesUser.peminjaman.peminjamanku', compact('peminjams'));
    }
}
