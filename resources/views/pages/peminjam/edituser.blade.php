@extends('layoutsUsers.app')

@section('content')
<div class="row">
    <div class="card col-md-8 mx-auto p-4">
        <h3 class="card-title text-center">Edit User</h3>

        <!-- Notifikasi Pesan -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <form action="/update/pengguna/{{$user->id}}" method="POST">
            @csrf
            <div class="form-group mb-3">
                <label for="nama">Nama</label>
                <input type="text" name="nama" id="nama" class="form-control"
                       placeholder="Nama Lengkap"
                       value="{{ $user->nama }}" required>
            </div>
            <div class="form-group mb-3">
                <label for="kelas">Kelas</label>
                <input type="text" name="kelas" id="kelas" class="form-control"
                       placeholder="Kelas"
                       value="{{ $user->kelas }}" required>
            </div>
            <div class="form-group mb-3">
                <label for="jurusan">Jurusan</label>
                <input type="text" name="jurusan" id="jurusan" class="form-control"
                       placeholder="Jurusan"
                       value="{{$user->jurusan }}" required>
            </div>
            <div class="form-group mb-3">
                <label for="tanggal_bergabung">Tanggal Bergabung</label>
                <input type="date" name="tanggal_bergabung" id="tanggal_bergabung" class="form-control"
                       value="{{$user->tanggal_bergabung }}" required>
            </div>
            <div class="form-group mb-3">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control"
                       placeholder="Email"
                       value="{{ $user->email }}" readonly required>
            </div>
            <div class="form-group mb-3">
                <label for="nomor_telepon">Nomor Telepon</label>
                <input type="text" name="nomor_telepon" id="nomor_telepon" class="form-control"
                       placeholder="Nomor Telepon"
                       value="{{$user->nomor_telepon }}" required>
            </div>
            <div class="form-group mb-3">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control"
                       placeholder="Password">
                <small class="text-muted">Biarkan kosong jika tidak ingin mengubah password.</small>
            </div>
            <div class="form-group mb-3">
                <label for="role">Role</label>
                <select name="role" id="role" class="form-control" required>
                    <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                    <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>User</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection
