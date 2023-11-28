<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anggota;

class AnggotaController extends Controller
{
   
    public function index()
    {
        $anggota = Anggota::all();

        return view('anggota.index', compact('anggota'));
    }

    
    public function create()
    {
        return view ('anggota.create');

    }

    public function store(Request $request)
    {
        $image = $request->file('foto');
        $image->storeAs('public/anggota', $image->hashName());
        Anggota::create([
            'kode' => $request->kode,
            'nama' =>  $request->nama,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'telpon' => $request->telpon,
            'alamat' => $request->alamat,
            'foto' => $image->hashName(),
        ]);

        return redirect('anggota')->with('sukses', 'Data Berhasil disimpan Cuyyy!');
    }

    
    public function show($id)
    {
        //
    }

   
    public function edit($id)
    {
        $anggota = Anggota::find($id);
        return view('anggota.edit', compact('anggota'));
    }

    
    public function update(Request $request, $id)
    {
        $image = $request->file('foto');
        $image->storeAs('public/anggota', $image->hashName());
        
        $anggota = Anggota::find($id);

        $anggota->kode = $request->kode;
        $anggota->nama = $request->nama;
        $anggota->tempat_lahir = $request->tempat_lahir;
        $anggota->tanggal_lahir = $request->tanggal_lahir;
        $anggota->jenis_kelamin = $request->jenis_kelamin;
        $anggota->telpon = $request->telpon;
        $anggota->alamat = $request->alamat;
        $anggota->foto = $image->hashName();
        $anggota->update();

        return redirect('anggota')->with('sukses', 'Data Berhasil Diupdate Cuyyy');
    }

    
    public function destroy($id)
    {
        $anggota = Anggota::find($id);
        $anggota->delete();
    
        return redirect('anggota')->with('sukses', 'Data Berhasil Didelete Cuyyy');
    }
}
