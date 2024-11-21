@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-body">
        <h5 class="card-title">Profile Saya</h5>
        <hr>
        <div>
            <p>Nama : {{Auth::User(->nama)}}</p>
        </div>
    </div>
</div>
@endsection