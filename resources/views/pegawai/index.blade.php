@extends('layout.template')

@section('content')
    <!-- START DATA -->
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <!-- FORM PENCARIAN -->
        <div class="pb-3">
        <h4 class="mb-3">Data Pegawai</h4>
        <form class="d-flex" action="{{ url('pegawai') }}" method="get">
            <input class="form-control me-1" type="search" name="katakunci" value="{{ Request::get('katakunci') }}" placeholder="Masukkan kata kunci" aria-label="Search">
            <button class="btn btn-secondary" type="submit">
                <i class="fa fa-magnifying-glass"></i>
                </button>
        </form>
        </div>
                        
        <!-- TOMBOL TAMBAH DATA -->
        <div class="pb-3">
        <a href='{{ url('pegawai/create') }}' class="btn btn-primary">
            <i class="fa fa-plus"></i>
            Tambah Data</a>
        </div>
                
        <table class="table table-bordered">
        <thead>
            <tr>
                <th class="col-md-1">No</th>
                <th class="col-md-3">NIP</th>
                <th class="col-md-4">Nama Lengkap</th>
                <th class="col-md-2">Mata Pelajaran</th>
                <th class="col-md-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->nip }}</td>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->mapel }}</td>
                <td>
                    <a href='{{ url('pegawai/'.$item->nip.'/edit') }}' class="btn btn-secondary btn-sm">
                        <i class="fa fa-pen"></i>
                        Edit</a>
                    <form onsubmit="return confirm('Yakin ingin menghapus data?')" class="d-inline" action="{{ url('pegawai/'.$item->nip) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" name="submit" class="btn btn-dark btn-sm">
                            <i class="fa fa-trash"></i>
                            Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
        </table>
        {{ $data->withQueryString()->links() }}
        <div class="pt-3">
            <a href="{{ url('home') }}" class="btn btn-secondary mb-3">
                <i class="fa fa-arrow-left"></i>
                Kembali</a>
        </div>
    </div>
    <!-- AKHIR DATA -->

@endsection