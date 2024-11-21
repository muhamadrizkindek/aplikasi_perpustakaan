<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\User;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    //index
    public function kategori(){
        $kategoris = Kategori::all();
        return view('pages.buku.kategoribuku',compact('kategoris'));
    }

    //
    public function create(){
        $kategoris = Kategori::all();
        return view('pages.buku.tambahkategori', compact('kategoris'));
    }

    public function store(Request $request){

        //validasi data
        $request->validate([
            'namakategori'       =>'required|max:255',
            'deskripsi'          =>'required'
        ],[
            'namakategori.required'       =>'nama harus diisi',
            'namakategori.max'            =>'nama maksimal 255 karakter',
            'deskripsi.required'          =>'deskripsi harus diisi'

        ]);

        //masukan data ke database
        $storeDatakategori=[
            'namakategori'  => $request->namakategori,
            'deskripsi'     => $request->deskripsi
        ];

        kategori::create($storeDatakategori);
        return redirect('kategoribuku');
    }

     //uptade buku
     public function editkategori($id)
     {
         $dataKategori = Kategori::find($id);
         $kategoris = Kategori::all();
         
         return view('pages.buku./editkategori', compact('dataKategori', 'kategoris'));
 
     }

     public function update(Request $request, $id)
    {
        $request->validate( [

            'namakategori'           =>'required',
            'deskripsi'              =>'required'
           
        ],[
            'namakategori.required'          =>'nama kategori harus diisi',
            'deskripsi.required'              =>'deskripsi harus diisi'
           

        ]);

        $storeDataKategori= [

            'namakategori'         => $request->namakategori,
            'deskripsi'           => $request->deskripsi
        ];
       
        $dataKategori = Kategori::find($id)->update($storeDataKategori);
    
        return redirect('/kategoribuku');
    
        }

     //delete
     public function destroy($id)
     {
         $kategoris = kategori::find($id);
         $kategoris->delete();
 
         return redirect('/kategoribuku');
     }
    
}
