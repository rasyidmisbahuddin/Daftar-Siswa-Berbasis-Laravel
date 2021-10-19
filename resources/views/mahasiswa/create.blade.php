@extends('template')

@section('main')
    <div id="mahasiswa">
        <h2>Tambah Mahasiswa</h2>

        {!! Form::open(['url' => 'mahasiswa', 'files' => true]) !!}
            @include('mahasiswa.form', ['submitButtonText' => 'Tambah Mahasiswa'])
        {!! Form::close() !!}
    </div>
@stop

@section('footer')
    @include('footer')
@stop