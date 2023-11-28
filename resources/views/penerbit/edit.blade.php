@extends('layout.app')

@section('title', 'Edit Penerbit')

@section('content')
    <section class="section">
    <div class="section-header">
    <h1>Edit Penerbit</h1>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4>Edit Penerbit</h4>
            </div>

            <div class="card-body">
                <form action="/penerbit/{{$penerbit->id}}" method="POST">
                    @csrf
                    @method('put')
                    <div class="form-group">
                    <label for="kode">Kode</label>
                    <input type="text" name="kode" class="form-control" value="{{$penerbit->kode}}">
                </div>
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" name="nama" class="form-control" value="{{$penerbit->nama}}">
                </div>
                <button class="btn btn-sm btn-warning" type="submit"><i class="fa fa-save"></i> Update</button>
                </form>
            </div>


            </div>
          </div>
        </div>
</section>
@endsection