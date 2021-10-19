@if (isset($jurusan))
{!! Form::hidden('id', $jurusan->id) !!}
@endif

@if ($errors->any())
<div class="form-group {{ $errors->has('nama_jurusan') ? 'has-error' : 'has-success' }}">
@else
<div class="form-group">
@endif

{!! Form::label('nama_jurusan', 'Nama jurusan:', ['class' => 'control-label']) !!}
{!! Form::text('nama_jurusan', null, ['class' => 'form-control']) !!}

@if ($errors->has('nama_jurusan'))
<span class="help-block">{{ $errors->first('nama_jurusan') }}</span>
@endif
</div>

<div class="form-group">
{!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>