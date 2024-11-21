@extends('layouts.app')

@section('content')
<div class="p-4">
    <div class="card">
        <div class="p-4 mt-4 me-3">
            <h4 class="card-title">Edit Peminjaman</h4>
        </div>
        <div class="card-body">
            <div class="basic-form">
                <form method="POST" action="/update/peminjam/{{$peminjaman->id}}">
                    @csrf

                    <div class="form-group">
                        <label>Nama Peminjam</label>
                        <input type="text" class="form-control" value="{{ $peminjaman->user->name }}" disabled>
                    </div>

                    <div class="form-group">
                        <label>Kelas</label>
                        <input type="text" name="kelas" class="form-control @error('kelas') is-invalid @enderror" value="{{ old('kelas', $peminjaman->kelas) }}">
                        @error('kelas')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Kategori Buku</label>
                        <select name="buku_id" class="form-control @error('buku_id') is-invalid @enderror">
                            <option value="">-- Pilih Buku --</option>
                            @foreach($bukus as $buku)
                                <option value="{{ $buku->id }}" {{ $buku->id == $peminjaman->buku_id ? 'selected' : '' }}>
                                    {{ $buku->judul }}
                                </option>
                            @endforeach
                        </select>
                        @error('buku_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Jumlah Peminjaman</label>
                        <input type="number" name="jumlah_peminjaman" class="form-control @error('jumlah_peminjaman') is-invalid @enderror" value="{{ old('jumlah_peminjaman', $peminjaman->jumlah_peminjaman) }}">
                        @error('jumlah_peminjaman')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Tanggal Peminjaman</label>
                        <input type="date" name="tanggal_peminjaman" class="form-control @error('tanggal_peminjaman') is-invalid @enderror" value="{{ old('tanggal_peminjaman', $peminjaman->tanggal_peminjaman) }}">
                        @error('tanggal_peminjaman')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Tanggal Pengembalian</label>
                        <input type="date" name="tanggal_pengembalian" class="form-control @error('tanggal_pengembalian') is-invalid @enderror" value="{{ old('tanggal_pengembalian', $peminjaman->tanggal_pengembalian) }}">
                        @error('tanggal_pengembalian')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Status</label>
                        <select name="status" class="form-control @error('status') is-invalid @enderror">
                            <option value="belum_dikembalikan" {{ $peminjaman->status == 'belum_dikembalikan' ? 'selected' : '' }}>Belum Dikembalikan</option>
                            <option value="sudah_dikembalikan" {{ $peminjaman->status == 'sudah_dikembalikan' ? 'selected' : '' }}>Sudah Dikembalikan</option>
                        </select>
                        @error('status')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary mt-3">Simpan Perubahan</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
