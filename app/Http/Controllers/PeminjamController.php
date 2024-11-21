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
    public function index()
    {
        $peminjamans = Peminjam::with(['user', 'buku'])->get(); // Memuat relasi user dan buku
        return view('pages.peminjam.peminjaman', compact('peminjamans'));
    }



    public function create()
    {
        $bukus = Buku::all(); // Mengambil data barang
        return view('pages.peminjam.tambah', compact('bukus'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kelas' => 'required|string|max:255',
            'buku_id' => 'required',
            'jumlah_peminjaman' => 'required|integer|min:1',
            'tanggal_peminjaman' => 'required|date',
            'tanggal_pengembalian' => 'required|date|after_or_equal:tanggal_peminjaman',
        ]);

        Peminjam::create([
            'user_id' => auth()->id(), // Mendapatkan ID pengguna yang sedang login
            'kelas' => $request->kelas,
            'buku_id' => $request->buku_id,
            'jumlah_peminjaman' => $request->jumlah_peminjaman,
            'tanggal_peminjaman' => $request->tanggal_peminjaman,
            'tanggal_pengembalian' => $request->tanggal_pengembalian,
            'status' => 'belum_dikembalikan', // Default status
        ]);

        return redirect('/anggota')->with('success', 'Peminjaman berhasil ditambahkan!');
    }


    public function edit($id)
    {
        $peminjaman = Peminjam::findOrFail($id); // Temukan peminjaman berdasarkan ID
        $bukus = Buku::all(); // Ambil semua data buku untuk dropdown
        return view('pages.peminjam.editpinjaman', compact('peminjaman', 'bukus'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'kelas' => 'required|string|max:255',
            'buku_id' => 'required',
            'jumlah_peminjaman' => 'required|integer|min:1',
            'tanggal_peminjaman' => 'required|date',
            'tanggal_pengembalian' => 'required|date|after_or_equal:tanggal_peminjaman',
        ]);

        $peminjaman = Peminjam::findOrFail($id);
        $peminjaman->update([
            'kelas' => $request->kelas,
            'buku_id' => $request->buku_id,
            'jumlah_peminjaman' => $request->jumlah_peminjaman,
            'tanggal_peminjaman' => $request->tanggal_peminjaman,
            'tanggal_pengembalian' => $request->tanggal_pengembalian,
            'status' => $request->status ?? 'belum_dikembalikan', // Status dapat diubah jika diperlukan
        ]);

        return redirect('/anggota')->with('success', 'Peminjaman berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $peminjam = Peminjam::findOrFail($id);
        $peminjam->delete();

        return redirect('/anggota')->with('success', 'Peminjaman berhasil dihapus!');
    }
}


