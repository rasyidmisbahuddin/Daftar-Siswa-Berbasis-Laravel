@extends('template')

@section('main')
    <div id="homepage">
        <h2>List Mahasiswa</h2>
        <p>Ini adalah daftar-daftar halaman mahasiswa yang meliputi: </p>
        <p>- Nama mahasiswa</p>
    	<p>- Jumlah semester yang ditempuh</p>
    	<p>- Jurusan yang diikuti pada saat kuliah </p>

    	<p> Selamat Membaca! </p>
    </div>
@stop

@section('footer')
    @include('footer')
@stop
