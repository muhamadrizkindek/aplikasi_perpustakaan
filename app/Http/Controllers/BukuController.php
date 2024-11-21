<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use App\Models\User;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    //
    public function index(){
        $bukus = Buku::all();
        return view('pages.buku.databuku',compact('bukus'));
    }

    //
    public function create(){
        $kategoris = Kategori::all();
        $bukus = Buku::all();
        return view('pages.buku.tambahbuku', compact('kategoris', 'bukus'));
    }

    public function store(Request $request){

        $request->validate([
            'kategori_id'        =>'required',
            'nama_buku'          =>'required',
            'judul'              =>'required',
            'penulis'            =>'required',
            'penerbit'           =>'required',
            'tahun_terbit'       =>'required',
            'jumlah_tersedia'    =>'required|max:255'

        ],[
            'kategori_id.required'        =>'kategori harus diisi',
            'nama_buku.required'          =>'nama harus diisi',
            'judul.required'              =>'judul harus diisi',
            'penulis.required'            =>'penulis harus diisi',
            'penerbit.required'           =>'penerbit harus diisi',
            'tahun_terbit.required'       =>'tahun terbit ',
            'jumlah_tersedia.max'         =>'jumlah maksimal 255'

        ]);

        //masukan data ke database
        $storeDataBuku=[
            'kategori_id'         => $request->kategori_id,
            'nama_buku'           => $request->nama_buku,
            'judul'               => $request->judul,
            'penulis'             => $request->penulis,
            'penerbit'            => $request->penerbit,
            'tahun_terbit'        => $request->tahun_terbit,
            'jumlah_tersedia'     => $request->jumlah_tersedia
        ];


        Buku::create($storeDataBuku);
        return redirect('/databuku');
    }

    //uptade buku
    public function editbuku($id)
    {
        $dataBuku = Buku::find($id);
        $kategoris = Kategori::all();
        return view('pages.buku./editbuku', compact('dataBuku', 'kategoris'));

    }



public function update(Request $request, $id)
{
    // Validasi input
    $request->validate([
        'kategori_id'        => 'required|exists:kategori_buku,id', // Validasi kategori_id
        'nama_buku'          => 'required|max:255', // Validasi nama buku
        'judul'              => 'required|max:255', // Validasi judul buku
        'penulis'            => 'required|max:255', // Validasi penulis buku
        'penerbit'           => 'required|max:255', // Validasi penerbit buku
        'tahun_terbit'       => 'required|date', // Validasi tahun terbit sebagai tanggal
        'jumlah_tersedia'    => 'required|numeric|max:255', // Validasi jumlah tersedia
    ], [
        'kategori_id.required' => 'Kategori harus diisi',
        'kategori_id.exists'   => 'Kategori yang dipilih tidak valid',
        'nama_buku.required'   => 'Nama buku harus diisi',
        'judul.required'       => 'Judul buku harus diisi',
        'penulis.required'     => 'Penulis harus diisi',
        'penerbit.required'    => 'Penerbit harus diisi',
        'tahun_terbit.required' => 'Tahun terbit harus diisi',
        'jumlah_tersedia.required' => 'Jumlah tersedia harus diisi',
        'jumlah_tersedia.numeric' => 'Jumlah tersedia harus berupa angka',
    ]);

    // Cari buku berdasarkan ID, jika tidak ditemukan akan menghasilkan error
    $buku = Buku::findOrFail($id);

    // Menyimpan data buku yang di-update
    $buku->update([
        'kategori_id'         => $request->kategori_id,
        'nama_buku'           => $request->nama_buku,
        'judul'               => $request->judul,
        'penulis'             => $request->penulis,
        'penerbit'            => $request->penerbit,
        'tahun_terbit'        => $request->tahun_terbit,
        'jumlah_tersedia'     => $request->jumlah_tersedia,
    ]);

    // Redirect ke halaman daftar buku dengan pesan sukses
    return redirect('/databuku')->with('success', 'Buku berhasil diperbarui');
}


    //delete
    public function destroy($id)
    {
        $bukus = buku::find($id);
        $bukus->delete();

        return redirect('/databuku')->with('bukus');
    }
}



