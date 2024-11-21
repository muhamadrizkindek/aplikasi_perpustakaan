@extends('layouts.app')
@section('content')

<div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Data buku</h4>
                                <div class="p-4">
                                <div class="text-right"><a href="/tambahbuku" class="btn btn-primary">tambah buku</a></div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table header-border table-responsive-sm " >
                                        <thead class="text-dark">
                                            <tr>
                                                <th>No</th>
                                                <th>kategori</th>
                                                <th>Nama buku</th>
                                                <th>Judul</th>
                                                <th>Penulis</th>
                                                <th>Penerbit</th>
                                                <th>Tahun terbit</th>
                                                <th>Jumlah tersedia</th>
                                                <th>aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-dark">
                                            @foreach ($bukus as $no => $buku)
                                            <tr>
                                                <th>{{ $no + 1 }}</th>
                                                <td>{{ $buku->kategori ? $buku->kategori->namakategori : 'tidak ada buku' }}</td>
                                                <td>{{ $buku->nama_buku }}</td>
                                                <td>{{ $buku->judul }}</td>
                                                <td>{{ $buku->penulis }}</td>
                                                <td>{{ $buku->penerbit }}</td>
                                                <td>{{ $buku->tahun_terbit }}</td>
                                                <td>{{ $buku->jumlah_tersedia }}</td>
                                                <td>
                                                    <a href="/editbuku/{{ $buku->id }}" 
                                                    class="btn btn-primary">Edit</a>
                                                    <a onClick="return confirm('apakah anda yakin ingin menghapus data tersebut?')"
                                                       href="/destroybuku/{{ $buku->id }}" 
                                                       class="btn btn-danger">hapus</a>
                                                </td>
                                            </tr>
                                        </div>
                                      </div>
                    @endforeach
                    @endsection