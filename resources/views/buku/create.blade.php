@extends('layout.app')

@section('title', 'Tambah')

@section('content')

<section class="section">
    <div class="section-header">
        <h4>
            Buku
        </h4>
    </div>
    
    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4>
                    Tambah Data 
                </h4>
            </div>

            <div class="card-body">
                <form action="{{route('buku.store')}}"  enctype="multipart/form-data" method="POST">
                    @csrf 
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="kode">Kode</label>
                            <input type="text" name="kode" id="kode" class="form-control">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="judul">Judul</label>
                            <input type="text" name="judul" id="judul" class="form-control">
                        </div>
                    </div>

                    <!-- Kategori_id -->
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="kategori_id">Kategori</label>
                            <select name="kategori_id" id="kategori_id" class="form-control">
                            @foreach($kategori as $kt)
                                <option value={{"$kt->id"}}>{{$kt->nama}}</option>
                             @endforeach
                            </select>
                        </div>
                        
                        <!-- penerbit_id -->
                            <div class="form-group col-md-6">
                                <label for="penerbit_id">Penerbit</label>
                                <select name="penerbit_id" id="penerbit_id" class="form-control">
                                @foreach($penerbit as $peyek)
                                <option value={{"$peyek->id"}}>{{$peyek->nama}}</option>
                                @endforeach
                                </select>
                            </div>
                      

                        <div class="form-group col-md-6">
                            <label for="isbn">ISBN</label>
                            <input type="text" name="isbn" id="isbn" class="form-control">
                        </div>


                        <div class="form-group col-md-6">
                            <label for="pengarang">Pengarang</label>
                            <input type="text" name="pengarang" id="pengarang" class="form-control">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="telpon">Telphone</label>
                            <input type="number" name="telpon" id="telpon" class="form-control">
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="jumlah_halaman">Jumlah Halaman</label>
                                <input type="number" name="jumlah_halaman" id="jumlah_halaman" class="form-control">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="stok">Stok</label>
                                <input type="number" name="stok" id="stok" class="form-control">
                            </div>

                            <div class="form-group col-md-4">
                                <label for="tahun_terbit">Tahun Terbit</label>
                                <input type="number" name="tahun_terbit" id="tahun_terbit" class="form-control">
                            </div>
                            </div>

                        <div class="form-group col-md-6">
                            <label for="sinopsis">sinopsis</label>
                           <textarea name="sinopsis" id="sinopsis" class="form-control" cols="30" rows="10"></textarea>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="gambar">gambar</label>
                            <input type="file" name="gambar" id="gambar" class="form-control-file">
                        </div>

                          
                          
  
                        
                    </div>
                    <button type="submit" class="btn btn-success"><i class="fa fa-save-">Simpan Data </button>
                </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection