@extends('layoutsUsers.app')
@section('content')
<div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">PeminjamanKu</h4>
                                <div class="p-4">
                                <div class="text-right"><a href="/tambah" class="btn btn-primary">tambah pinjaman</a></div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table header-border table-responsive-sm">
                                        <thead class="text-dark">
                                            <tr>
                                                <th>No</th>
                                                <th>kelas</th>
                                                <th>Buku</th>
                                                <th>Kategori</th>
                                                <th>Jumlah pinjaman</th>
                                                <th>Tanggal Peminjam</th>
                                                <th>Tanggal pengembalian</th>
                                                <th>Status</th>
                                                <th>aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-dark">
                                            @foreach ($peminjams as $no => $peminjam)
                                            <tr>
                                                <th>{{ $no + 1 }}</th>
                                                <td>{{ $peminjam->kelas }}</td>
                                                <td>{{ $peminjam->buku_id }}</td>
                                                <td>{{ $peminjam->kategori_id }}</td>
                                                <td>{{ $peminjam->jumlah_pinjaman }}</td>
                                                <td>{{ $peminjam->tanggal_peminjaman }}</td>
                                                <td>{{ $peminjam->tanggal_pengembalian }}</td>
                                                <td>
                                                    <a href="/edit/peminjam{{ $peminjam->id }}" class="btn btn-primary">Edit</a>
                                                    <a onClick="return confirm('apakah anda yakin ingin menghapus data tersebut?')" href="/destroy/{{ $peminjam->id }}" class="btn btn-danger">Hapus</a>
                                                </td>
                                            </tr>
                                        </div>  
                                    </div>
                                </div>
                            </div>   
                        </div>
                    </div>  
                </div>            
            </div>
        </div>
    </div>
</div>
@endsection
                                   