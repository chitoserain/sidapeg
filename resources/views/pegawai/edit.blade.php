@extends('layout.template')

@section('content')
    <!-- START FORM -->
    <form action='{{ url('pegawai/'.$data->nip) }}' method='post'>
        @csrf
        @method('PUT')
        <div class="my-3 p-3 bg-body rounded shadow-sm">
            <h4 class="mb-3">Halaman Edit Data</h4>
            <a href="{{ url('pegawai') }}" class="btn btn-secondary mb-3">
                <i class="fa fa-arrow-left"></i>
                Kembali</a>
            <div class="mb-3 row">
                <label for="nip" class="col-sm-2 col-form-label">NIP</label>
                <div class="col-sm-10">
                    {{ $data->nip }}
                </div>
            </div>
            <div class="mb-3 row">
                <label for="nama" class="col-sm-2 col-form-label">Nama Lengkap</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='nama' value="{{ $data->nama }}" id="nama" placeholder="Masukkan Nama Lengkap">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="mapel" class="col-sm-2 col-form-label">Mata Pelajaran</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='mapel' value="{{ $data->mapel }}" id="mapel" placeholder="Masukkan Mata Pelajaran">
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