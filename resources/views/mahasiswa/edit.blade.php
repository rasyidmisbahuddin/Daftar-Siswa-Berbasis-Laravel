@extends('template')

@section('main')
    <div id="mahasiswa">
        <h2>Edit Detail Mahasiswa</h2>

        {!! Form::model($mahasiswa, ['method' => 'PATCH', 'files' => true, 'action' => ['mahasiswaController@update', $mahasiswa->id]]) !!}
            @include('mahasiswa.form', ['submitButtonText' => 'Update mahasiswa'])
        {!! Form::close() !!}
    </div>
@stop

@section('footer')
    @include('footer')
@stop