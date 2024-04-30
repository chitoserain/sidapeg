@extends('layout.template')

@section('content')
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <h4 class="mb-3">Tentang</h4>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. 
            Numquam, explicabo animi impedit minima doloremque molestiae laboriosam cumque facere quaerat vitae sapiente, 
            nam commodi pariatur, quasi quas. Quos officiis quaerat quia.</p>
        <a href="{{ url('home') }}" class="btn btn-secondary mb-3">
            <i class="fa fa-arrow-left"></i>
            Kembali</a>
    </div>
@endsection