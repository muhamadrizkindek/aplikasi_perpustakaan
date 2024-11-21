@extends('layouts.app')
@section('content')
<div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">pinjaman</h4>
                                <div class="p-4">
                                <div class="text-right"><a href="/tambahbuku" class="btn btn-primary">tambah buku</a></div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table header-border table-responsive-sm">
                                        <thead class="text-dark">
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>buku</th>
                                                <th>Tgl peminjam</th>
                                                <th>Tgl pengembalian</th>
                                                <th>Status</th>
                                                <th>aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-dark">
                                            <tr>
                                                <th>1</th>
                                                <td>ayu</a>
                                                </td>
                                                <td>maling kundang</td>
                                                <td><span class="text-muted">Oct 12, 2024</span>
                                                </td>
                                                <td><span class="text-muted">Oct 15, 2024</span>
                                                </td>
                                                <td>belum di kembalikan</td>
                                                <td>
                                                    <a href="/editpinjaman" class="btn btn-primary">Edit</a>
                                                    <a href="/editbuku" class="btn btn-danger">hapus</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>2</th>
                                                <td>ayu</a>
                                                </td>
                                                <td>maling kundang</td>
                                                <td><span class="text-muted">Oct 12, 2024</span>
                                                </td>
                                                <td><span class="text-muted">Oct 15, 2024</span>
                                                </td>
                                                <td>belum di kembalikan</td>
                                                <td>
                                                    <a href="/editpinjaman" class="btn btn-primary">Edit</a>
                                                    <a href="/editbuku" class="btn btn-danger">hapus</a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    


@endsection