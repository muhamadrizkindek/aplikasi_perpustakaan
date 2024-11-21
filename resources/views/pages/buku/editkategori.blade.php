@extends('layouts.app')
@section('content')
  <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Edit kategori</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                <form action="/updatekategori/{{ $dataKategori->id }}" method="POST"
                                          enctype="multipart/form-data">
                                          @csrf
                                          <div class="form-group">
                                                <label>Kategori</label>
                                                <input name="namakategori" type="text" value="{{ $dataKategori->namakategori }}"
                                                class="form-control" placeholder="masukan kategori">
                                            </div>
                                            <div class="form-group">
                                                <label>Deskripsi</label>
                                                <input name="deskripsi" type="text" value="{{ $dataKategori->deskripsi }}"
                                                class="form-control" placeholder="masukan deskripsi">
                                            </div>
                                            <button type="submit" class="btn btn-primary mt-3">Submit</button>       
                                  </form>
                                </div>
                            </div>
                        </div>
                        
@endsection