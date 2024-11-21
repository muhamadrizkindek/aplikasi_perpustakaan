@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-body">
        <h5 class="card-title">Profil Saya</h5>
        <hr>
        <div>
            <p><strong>Nama:</strong> {{ Auth::user()->nama }}</p>
            <p><strong>Kelas:</strong> {{ Auth::user()->kelas }}</p>
            <p><strong>Jurusan:</strong> {{ Auth::user()->jurusan }}</p>
            <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
            <p><strong>Nomor Telepon:</strong> {{ Auth::user()->nomor_telepon }}</p>
            <p><strong>Tanggal Bergabung:</strong> {{ Auth::user()->tanggal_bergabung }}</p>
            <p><strong>Role:</strong> {{ ucfirst(Auth::user()->role) }}</p>
        </div>
    </div>
</div>
@endsection
