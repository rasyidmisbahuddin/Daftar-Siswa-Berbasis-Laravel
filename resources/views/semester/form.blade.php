@if (isset($semester))
    {!! Form::hidden('id', $semester->id) !!}
@endif

@if ($errors->any())
    <div class="form-group {{ $errors->has('nama_semester') ? 'has-error' : 'has-success' }}">
@else
     <div class="form-group">
@endif
    {!! Form::label('nama_semester', 'Nama semester:', ['class' => 'control-label']) !!}
    {!! Form::text('nama_semester', null, ['class' => 'form-control']) !!}
    @if ($errors->has('nama_semester'))
        <span class="help-block">{{ $errors->first('nama_semester') }}</span>
    @endif
</div>

<div class="form-group">
    {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>