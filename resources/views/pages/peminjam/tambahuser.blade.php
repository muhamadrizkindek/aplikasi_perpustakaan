@extends('layoutsUsers.app')

@section('content')

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
<div class="row">
    <div class="card col-md-8 mx-auto p-4">
        <h3 class="card-title text-center">{{ isset($user) ? 'Edit User' : 'Tambah User' }}</h3>
        <form action="/store/pengguna" method="POST">
            @csrf
            <div class="form-group mb-3">
                <label for="nama">Nama</label>
                <input type="text" name="nama" id="nama" class="form-control"
                       placeholder="Nama Lengkap"
                       value="{{ old('nama') }}" required>
                @error('nama')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="kelas">Kelas</label>
                <input type="text" name="kelas" id="kelas" class="form-control"
                       placeholder="Kelas"
                       value="{{ old('kelas') }}" required>
                       @error('kelas')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="jurusan">Jurusan</label>
                <input type="text" name="jurusan" id="jurusan" class="form-control"
                       placeholder="Jurusan"
                       value="{{ old('jurusan')}}" required>
                       @error('jurusan')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="tanggal_bergabung">Tanggal Bergabung</label>
                <input type="date" name="tanggal_bergabung" id="tanggal_bergabung" class="form-control"
                       value="{{ old('tanggal_bergabung') }}" required>
                       @error('tanggal_bergabung')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control"
                       placeholder="Email"
                       value="{{ old('email') }}"
                       {{ isset($user) ? 'readonly' : '' }} required>
                       @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="nomor_telepon">Nomor Telepon</label>
                <input type="text" name="nomor_telepon" id="nomor_telepon" class="form-control"
                       placeholder="Nomor Telepon"
                       value="{{ old('nomor_telepon')}}" required>
                       @error('nomor_telepon')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control"
                       placeholder="Password"
                       value="{{ old('password')}}">
                       @error('password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="role">Role</label>
                <select name="role" id="role" class="form-control" required>
                    <option value="admin" {{ old('role', $user->role ?? '') == 'admin' ? 'selected' : '' }}>Admin</option>
                    <option value="user" {{ old('role', $user->role ?? '') == 'user' ? 'selected' : '' }}>User</option>
                </select>
                @error('role')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">{{ isset($user) ? 'Update' : 'Simpan' }}</button>
            </div>
        </form>
    </div>
</div>
@endsection
