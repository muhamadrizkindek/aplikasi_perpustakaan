@extends('layoutsUsers.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="card-title">Tambah Peminjaman</h4>
    </div>
    <div class="card-body">
        <div class="basic-form">
            <form action="/store/peminjam" method="POST">
                @csrf

                <!-- User ID -->
                <div class="form-group">
                    <label>Nama Pengguna</label>
                    <input type="text" class="form-control" value="{{ Auth::user()->name }}" disabled>
                </div>

                <!-- Kelas -->
                <div class="form-group">
                    <label>Kelas</label>
                    <input name="kelas" value="{{ old('kelas') }}" type="text" class="form-control" placeholder="Masukkan kelas Anda">
                    @error('kelas')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Barang -->
                <div class="mb-3">
                    <label for="">buku</label>
                    <select class="form-select form-control" name="buku_id" aria-label="Default select example">
                        <option selected disabled>Pilih buku</option>
                        @foreach($bukus as $buku)
                            <option value="{{ $buku->id }}" {{ old('buku_id') == $buku->id ? 'selected' : '' }}>
                                {{ $buku->nama_buku }}
                            </option>
                        @endforeach
                    </select>
                    @error('buku_id')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Jumlah Peminjaman -->
                <div class="form-group">
                    <label>Jumlah Pinjaman</label>
                    <input name="jumlah_peminjaman" value="{{ old('jumlah_peminjaman') }}" type="text" class="form-control" placeholder="Masukkan jumlah pinjaman">
                    @error('jumlah_peminjaman')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Tanggal Peminjaman -->
                <div class="form-group">
                    <label>Tanggal Peminjaman</label>
                    <input name="tanggal_peminjaman" value="{{ old('tanggal_peminjaman') }}" type="date" class="form-control">
                    @error('tanggal_peminjaman')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Tanggal Pengembalian -->
                <div class="form-group">
                    <label>Tanggal Pengembalian</label>
                    <input name="tanggal_pengembalian" value="{{ old('tanggal_pengembalian') }}" type="date" class="form-control">
                    @error('tanggal_pengembalian')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Tombol Submit -->
                <button type="submit" class="btn btn-primary mt-3">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection
