@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="card-title">Daftar User</h4><a href="/tambahpengguna" class="btn btn-primary">tambah pengguna</a>
    </div>
    <div class="card-body">
        <div class="basic-form">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Kelas</th>
                        <th>Jurusan</th>
                        <th>Tanggal Bergabung</th>
                        <th>Email</th>
                        <th>Nomor Telepon</th>
                        <th>Role</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $no=> $user)
                    <tr>
                        <td>{{ $no +1 }}</td>
                        <td>{{ $user->nama }}</td>
                        <td>{{ $user->kelas }}</td>
                        <td>{{ $user->jurusan }}</td>
                        <td>{{ $user->tanggal_bergabung }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->nomor_telepon }}</td>
                        <td>{{ $user->role }}</td>
                        <td>
                            <a href="/edit/pengguna/{{$user->id}}" class="btn btn-warning btn-sm">Edit</a>
                            <a onClick="return confirm('apaka anda yakin ingin menghapus?')"
                                href="/destroy/pengguna/{{ $user->id }}"
                                class="btn btn-danger text-black">Hapus</a>
                        </td>
                    </tr>

                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
