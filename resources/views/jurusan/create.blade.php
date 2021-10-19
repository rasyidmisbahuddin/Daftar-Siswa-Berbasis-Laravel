@extends('template')

@section('main')
    <div id="jurusan">
    <h2>Tambah jurusan</h2>

    {!! Form::open(['url' => 'jurusan']) !!}
    @include('jurusan.form', ['submitButtonText' => 'Tambah jurusan'])
    {!! Form::close() !!}
    </div>
@stop

@section('footer')
    @include('footer')
@stop