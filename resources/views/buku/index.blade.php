@extends('layout.app')

@section('title', 'Anggota')

@section('content')
 <section class="section">
    <div class="section-header">
        <h4>Buku</h4>
    </div>
    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4>BUKU</h4>
                <div class="card-header-form">
                    <a href="{{route('buku.create')}}" class="btn btn-success btn-sm"><i class="fa fa-plus"></i>Tambah data </a>

                </div>
            </div>
            <div class="card-body">
                <table class="table table-striped" id="table">
                    <thead>
                        <tr>
                            <th style="width:5%" >#</th>
                            <th >Kode</th>
                            <th >Judul</th>
                            <th>Pengarang</th>
                            <th>Jumlah-Halaman</th>
                            <th>Foto</th>
                            <th style="width:11%" >Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($buku as $b)
                        <tr>
                            <td>{{$loop->iteration}}</td>
{{--                            
                            <td>
                            <img src="data:image/png,{{ DNS1D::getBarcodePNG($b->kode, 'C39+')}}" alt="barcode"  style="width: 100px; height: 50x" />
                            </td> --}}
                            <td> {!! DNS1D::getBarcodeHTML('$'.$b->kode,'C39+',1,25)!!}</td>
                            <td>{{$b->judul}}</td>
                            <td>{{$b->pengarang}}</td>
                            <td>{{$b->jumlah_halaman}}</td>
                            <td><img src="{{asset('/storage/buku/'.$b->gambar)}}" class="rounded" style="width: 50px"></td>
                            <td>
                                <form action="{{route('buku.destroy', $b->id)}}" method="post" id="delete-form{{$b->id}}">
                                    @method('delete')
                                    @csrf
                                 <a href="{{route('buku.edit', $b->id)}}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                <a href="{{route('buku.edit',$b->id)}}" class="btn btn-sm btn-info mr-1"><i class="fa fa-print"></i></a> 
                                <button class="btn btn-sm btn-danger fa fa-trash" onclick="confirmDelete('delete-form{{$b->id}}')"></button>
                            </form> 
                            </td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
 </section>

@endsection

@push('script')
<script>

    $(document).ready(function() {
        $('#table').dataTable();
    })

    function confirmDelete(formID)
    {
        event.preventDefault();
        swal({
           title: 'Apakah Anda Yakin?',
           text: 'Setelah dihapus, Anda tidak dapat memulihkannya!',
           icon: 'warning',
           buttons: true,
           dangerMode: true, 
        })
        .then((willDelete) => {
            if (willDelete) {
                document.getElementById(formID).submit();

            }
        });
    }
</script>
@endpush
