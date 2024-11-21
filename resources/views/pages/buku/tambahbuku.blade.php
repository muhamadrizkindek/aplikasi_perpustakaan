@extends('layouts.app')

@section('content')
  <div class="card">
    <div class="card-header">
      <h4 class="card-title">Tambah Data Buku</h4>
    </div>
    <div class="card-body">
      <div class="basic-form">
        <form action="/store/buku" method="POST">
          @csrf
          
          <!-- Kategori Buku -->
          <div class="mb-3">
            <label for="kategori" class="form-label">Kategori Buku</label>
            <select class="form-select form-control" name="kategori_id" aria-label="Default select example">
              @foreach($kategoris as $kategori)
                <option value="{{ $kategori->id }}" {{ old('kategori_id') == $kategori->id ? 'selected' : '' }}>
                  {{ $kategori->namakategori }}
                </option>
              @endforeach
            </select>
            @error('kategori_id')
              <p class="text-danger">{{ $message }}</p>
            @enderror
          </div>

          <!-- Nama Buku -->
          <div class="form-group">
            <label for="nama_buku" class="form-label">Nama Buku</label>
            <input name="nama_buku" value="{{ old('nama_buku') }}" type="text" class="form-control" placeholder="Masukkan nama buku">
            @error('nama_buku')
              <p class="text-danger">{{ $message }}</p>
            @enderror
          </div>

          <!-- Judul Buku -->
          <div class="form-group">
            <label for="judul" class="form-label">Judul Buku</label>
            <input name="judul" value="{{ old('judul') }}" type="text" class="form-control" placeholder="Masukkan judul buku">
            @error('judul')
              <p class="text-danger">{{ $message }}</p>
            @enderror
          </div>

          <!-- Penulis -->
          <div class="form-group">
            <label for="penulis" class="form-label">Penulis</label>
            <input name="penulis" value="{{ old('penulis') }}" type="text" class="form-control" placeholder="Masukkan penulis buku">
            @error('penulis')
              <p class="text-danger">{{ $message }}</p>
            @enderror
          </div>

          <!-- Penerbit -->
          <div class="form-group">
            <label for="penerbit" class="form-label">Penerbit</label>
            <input name="penerbit" value="{{ old('penerbit') }}" type="text" class="form-control" placeholder="Masukkan penerbit buku">
            @error('penerbit')
              <p class="text-danger">{{ $message }}</p>
            @enderror
          </div>

          <!-- Tahun Terbit -->
          <div class="form-group">
            <label for="tahun_terbit" class="form-label">Tahun Terbit</label>
            <input name="tahun_terbit" value="{{ old('tahun_terbit') }}" type="date" class="form-control">
            @error('tahun_terbit')
              <p class="text-danger">{{ $message }}</p>
            @enderror
          </div>

          <!-- Jumlah Tersedia -->
          <div class="form-group">
            <label for="jumlah_tersedia" class="form-label">Jumlah Tersedia</label>
            <input name="jumlah_tersedia" value="{{ old('jumlah_tersedia') }}" type="text" class="form-control" placeholder="Masukkan jumlah buku yang tersedia">
            @error('jumlah_tersedia')
              <p class="text-danger">{{ $message }}</p>
            @enderror
          </div>

          <!-- Submit Button -->
          <button type="submit" class="btn btn-primary mt-3">Submit</button>
        </form>
      </div>
    </div>
  </div>
@endsection
