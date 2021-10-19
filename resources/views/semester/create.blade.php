@extends('template')

@section('main')
    <div id="semester">
        <h2>Tambah semester</h2>

        {!! Form::open(['url' => 'semester']) !!}
            @include('semester.form', ['submitButtonText' => 'Tambah semester'])
        {!! Form::close() !!}
    </div>
@stop

@section('footer')
    @include('footer')
@stop