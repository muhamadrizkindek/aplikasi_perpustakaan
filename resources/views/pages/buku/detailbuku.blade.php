@extends('layouts.app')
@section('content')

<div class="container-fluid">
    <div class="card">
        <div class="text-center">
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col" class="text-dark">No</th>
                        <th scope="col" class="text-dark">kategori</th>
                        <th scope="col" class="text-dark">Judul</th>
                        <th scope="col" class="text-dark">deskripsi</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Novel</td>
                        <td>ayat ayat cinta</td>
                        <td>ayat ayat cinta menceritakan tentang cinta. Tapi bukan sekedar cinta biasa.</td>
                        </td>
                    </tr>
                </tbody>
                <tbody>
                    <tr>
                        <td>2</td>
                        <td>Dongeng</td>
                        <td>anak gembala dan serigala</td>
                        <td>anak gembala yang berkerja disaudar kaya raya</td>
                    </tr>
                </tbody>
            </table>
        </div>
        </div>
    </div>
</div>

@endsection