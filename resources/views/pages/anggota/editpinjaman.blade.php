@extends('layouts.app')
@section('content')
<div class="p-4">
    <div class="card">
        <div class="p-4 mt-4 me-3">
                                <h4 class="card-title">Edit pinjaman</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form>
                                        
                                            <div class="form-group">
                                                <label>nama </label>
                                                <input type="text" class="form-control" placeholder="">
                                                <div class="form-group">
                                                <label>Kategori buku</label>
                                                <input type="text" class="form-control" placeholder="">
                                            <div class="form-group">
                                                <label>Tgl peminjam</label>
                                                <input type="date" class="form-control" placeholder="">
                                            <div class="form-group">
                                                <label>Tgl pengembalian</label>
                                                <input type="date" class="form-control" placeholder="">
                                            <div class="form-group">
                                                <label>Status</label>
                                                <input type="text" class="form-control" placeholder="">
                                            </div>
                                            <button type="submit" class="btn btn-primary mt-3">Submit</button>
                                        
                                    </form>
                                </div>
                            </div>
                        </div>
                        
</div>
@endsection