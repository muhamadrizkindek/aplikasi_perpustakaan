@extends('layouts.app')
@section('content')
<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Pinjaman</h4>
            <div class="p-4">
                <div class="text-right">
                    <a href="/tambahpeminjam" class="btn btn-primary">Tambah peminjam</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table header-border table-responsive-sm">
                    <thead class="text-dark">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Kelas</th>
                            <th>Buku</th>
                            <th>Jumlah Peminjaman</th>
                            <th>Tanggal Peminjaman</th>
                            <th>Tanggal Pengembalian</th>
                            <th>Status</th>
                            @if (Auth::user()->role == 'admin')
                            <th>Aksi</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody class="text-dark">
                        @foreach ($peminjamans as $no => $peminjam)
                        <tr>
                            <td>{{ $no + 1 }}</td>
                            <td>{{ $peminjam->user ? $peminjam->user->nama : 'nama user tidak ada'}}</td>
                            <td>{{ $peminjam->kelas }}</td>
                            <td>{{ $peminjam->buku->judul }}</td>
                            <td>{{ $peminjam->jumlah_peminjaman }}</td>
                            <td>{{ $peminjam->tanggal_peminjaman }}</td>
                            <td>{{ $peminjam->tanggal_pengembalian }}</td>
                            <td>
                                @if ($peminjam->status == 'sudah_dikembalikan')
                                    <span class="badge badge-success">Sudah Dikembalikan</span>
                                @else
                                    <span class="badge badge-warning">Belum Dikembalikan</span>
                                @endif
                            </td>
                            @if (Auth::user()->role == 'admin')
                            <td>
                                <a href="/edit/peminjam/{{$peminjam->id}}" class="btn btn-warning btn-sm">Edit</a>
                                <a onClick="return confirm('apaka anda yakin ingin menghapus?')"
                                href="/destroy/peminjam/{{ $peminjam->id }}"
                                class="btn btn-danger text-black">Hapus</a>
                            </td>
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
