@extends('layout.template')

@section('content')
    
    <!-- START FORM -->
    <form action='{{ url('pegawai') }}' method='post'>
        @csrf
        <div class="my-3 p-3 bg-body rounded shadow-sm">
            <h4 class="mb-3">Halaman Tambah Data</h4>
            <a href="{{ url('pegawai') }}" class="btn btn-secondary mb-3">
                <i class="fa fa-arrow-left"></i>
                Kembali</a>
            <div class="mb-3 row">
                <label for="nip" class="col-sm-2 col-form-label">NIP</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" name='nip' value="{{ Session::get('nip') }}" id="nip" placeholder="Masukkan NIP">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="nama" class="col-sm-2 col-form-label">Nama Lengkap</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='nama' value="{{ Session::get('nama') }}" id="nama" placeholder="Masukkan Nama Lengkap">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="mapel" class="col-sm-2 col-form-label">Mata Pelajaran</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='mapel' value="{{ Session::get('mapel') }}" id="mapel" placeholder="Masukkan Mata Pelajaran">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="mapel" class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button></div>
            </div>
        </div>
    </form>
    <!-- AKHIR FORM -->
    
@endsection