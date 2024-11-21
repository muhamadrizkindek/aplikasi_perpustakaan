@extends('layoutsUsers.app')
@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="card-title">Tambah PeminjamanKu</h4>
    </div>
    <div class="card-body">
        <div class="basic-form">
            <form action="/store/peminjaman" method="POST">
                @csrf
                <div class="form-group">
                    <label>Kelas</label>
                    <input name="kelas" value="{{ old('kelas')}}" type="text" class="form-control" placeholder="Masukkan kelas Anda">
                    @error('kelas')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="">Judul Buku</label>
                    <select class="form-select form-control" name="buku_id" aria-label="Default select example">
                        @foreach($bukus as $buku)
                            <option value="{{ $buku->id }}">{{ $buku->nama_buku }}</option>
                        @endforeach
                    </select>
                    @error('buku_id')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="">Kategori</label>
                    <select class="form-select form-control" name="kategori_id" aria-label="Default select example">
                        @foreach($kategoris as $kategori)
                            <option value="{{ $kategori->id }}">{{ $kategori->namakategori }}</option>
                        @endforeach
                    </select>
                    @error('kategori_id')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Jumlah Pinjaman</label>
                    <input name="jumlah_peminjaman" value="{{ old('jumlah_peminjaman')}}" type="text" class="form-control" placeholder="Masukkan jumlah pinjaman Anda">
                    @error('jumlah_peminjaman')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Tanggal Peminjaman</label>
                    <input name="tanggal_peminjaman" value="{{ old('tanggal_peminjaman')}}" type="date" class="form-control">
                    @error('tanggal_peminjaman')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Tanggal Pengembalian</label>
                    <input name="tanggal_pengembalian" value="{{ old('tanggal_pengembalian')}}" type="date" class="form-control">
                    @error('tanggal_pengembalian')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary mt-3">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection
