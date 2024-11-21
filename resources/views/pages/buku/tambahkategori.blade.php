@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="card-title">Tambah kategori</h4>
    </div>
    <div class="card-body">
        <div class="basic-form">
            <form action="/store/kategori" method="POST">
                @csrf
                        <div class="form-group">
                            <label>Kategori</label>
                            <input name="namakategori" value="{{ old('namakategori')}}" type="text" class="form-control" placeholder="masukan kategori">
                            @error('namakategori')
                                <p class="text-denger">{{$message}}</p>
                            @enderror
                        </div>
                        <div>
                            <label>Deskripsi</label>
                            <input name="deskripsi" value="{{ old('deskripsi') }}" type="text" class="form-control" placeholder="masukan deskripsi">
                            @error('deskripsi')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                            <button type="submit" class="btn btn-primary mt-3">Submit</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection