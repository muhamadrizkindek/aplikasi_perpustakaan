@extends('layouts.app')
@section('content')

<div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Kategori buku</h4>
                                <div class="p-4">
                                <div class="text-right"><a href="/tambahkategori" class="btn btn-primary">tambah Kategori</a></div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table header-border table-responsive-sm">
                                        <thead class="text-dark">
                                            <tr>
                                                <th>no</th>
                                                <th>Kategori </th>
                                                <th>Deskripsi  </th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        @foreach ($kategoris as $no => $kategori)
                                        <tbody class="text-dark">
                                            <tr>
                                                <td>{{ $no + 1 }}</td>
                                                <td>{{ $kategori->namakategori }}</td>
                                                <td>{{ $kategori->deskripsi }}</td>
                                                <td>
                                                    <a href="/editkategori/{{ $kategori->id }}" 
                                                        class="btn btn-primary">Edit</a>
                                                    <a onClick="return confirm('apakah anda yakin ingin menghapus data tersebut?')"
                                                       href="/destroy/{{ $kategori->id }}" 
                                                       class="btn btn-danger">hapus</a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    


@endsection