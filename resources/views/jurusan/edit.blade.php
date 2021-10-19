@extends('template')

@section('main')
<div id="jurusan">
    <h2>Edit jurusan</h2>

    {!! Form::model($jurusan, ['method' => 'PATCH', 'action' => ['jurusanController@update', $jurusan->id]]) !!}
    @include('jurusan.form', ['submitButtonText' => 'Update jurusan'])
    {!! Form::close() !!}
</div>
@stop

@section('footer')
    @include('footer')
@stop