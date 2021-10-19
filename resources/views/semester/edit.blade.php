@extends('template')

@section('main')
    <div id="semester">
    <h2>Edit semester</h2>

    {!! Form::model($semester, ['method' => 'PATCH', 'action' => ['semesterController@update', $semester->id]]) !!}
        @include('semester.form', ['submitButtonText' => 'Update semester'])
    {!! Form::close() !!}
    </div>
@stop

@section('footer')
    @include('footer')
@stop