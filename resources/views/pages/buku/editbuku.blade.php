@extends('layouts.app')
@section('content')
<div class="p-4">

    <div class="card">
        <div class="p-4 mt-4 me-3">
            <h4 class="card-title">Edit Buku</h4>
        </div>
        <div class="card-body">
            <div class="basic-form">
                <!-- Form Edit Buku -->
                <form action="/updatebuku/{{ $dataBuku->id }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label>Kategori</label>
                        <select name="kategori_id" class="form-control">
                            <option value="">Pilih Kategori</option>
                            @foreach ($kategoris as $kategori)
                                <option value="{{ $kategori->id }}" {{ $dataBuku->kategori_id == $kategori->id ? 'selected' : '' }}>
                                    {{ $kategori->namakategori }}
                                </option>
                            @endforeach
                        </select>
                        @error('kategori_id')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Nama Buku</label>
                        <input name="nama_buku" type="text" value="{{ old('nama_buku', $dataBuku->nama_buku) }}" class="form-control" placeholder="Masukkan nama buku">
                        @error('nama_buku')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Judul</label>
                        <input name="judul" type="text" value="{{ old('judul', $dataBuku->judul) }}" class="form-control" placeholder="Masukkan judul">
                        @error('judul')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Penulis</label>
                        <input name="penulis" type="text" value="{{ old('penulis', $dataBuku->penulis) }}" class="form-control" placeholder="Masukkan nama penulis">
                        @error('penulis')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Penerbit</label>
                        <input name="penerbit" type="text" value="{{ old('penerbit', $dataBuku->penerbit) }}" class="form-control" placeholder="Masukkan nama penerbit">
                        @error('penerbit')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Tahun Terbit</label>
                        <input name="tahun_terbit" type="date" value="{{ old('tahun_terbit', $dataBuku->tahun_terbit) }}" class="form-control">
                        @error('tahun_terbit')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Jumlah Tersedia</label>
                        <input name="jumlah_tersedia" type="text" value="{{ old('jumlah_tersedia', $dataBuku->jumlah_tersedia) }}" class="form-control" placeholder="Masukkan jumlah tersedia">
                        @error('jumlah_tersedia')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary mt-3">Update Buku</button>
                </form>
            </div>
        </div>
    </div>

</div>
@endsection
