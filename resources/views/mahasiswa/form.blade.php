@if (isset($mahasiswa))
    {!! Form::hidden('id', $mahasiswa->id) !!}
@endif


<!-- No mahasiswa -->
@if ($errors->any())
<div class="form-group {{ $errors->has('nomhsw') ? 'has-error' : 'has-success' }}">
@else
<div class="form-group">
@endif
     {!! Form::label('nomhsw', 'No Mahasiswa:', ['class' => 'control-label']) !!}
     {!! Form::text('nomhsw', null, ['class' => 'form-control']) !!}
     @if ($errors->has('nomhsw'))
        <span class="help-block">{{ $errors->first('nomhsw') }}</span>
     @endif
</div>


<!-- NAMA -->
@if ($errors->any())
<div class="form-group {{ $errors->has('nama_mahasiswa') ? 'has-error' : 'has-success' }}">
@else
<div class="form-group">
@endif
     {!! Form::label('nama_mahasiswa', 'Nama Mahasiswa:', ['class' => 'control-label']) !!}
     {!! Form::text('nama_mahasiswa', null, ['class' => 'form-control']) !!}
     @if ($errors->has('nama_mahasiswa'))
        <span class="help-block">{{ $errors->first('nama_mahasiswa') }}</span>
     @endif
</div>


<!-- TANGGAL LAHIR -->
@if ($errors->any())
<div class="form-group {{ $errors->has('tanggal_lahir') ? 'has-error' : 'has-success' }}">
@else
<div class="form-group">
@endif
    {!! Form::label('tanggal_lahir', 'Tanggal Lahir:', ['class' => 'control-label']) !!}
    {!! Form::date('tanggal_lahir', !empty($mahasiswa) ? $mahasiswa->tanggal_lahir->format('Y-m-d'): null, ['class' => 'form-control', 'id' => 'tanggal_lahir']) !!}
    @if ($errors->has('tanggal_lahir'))
        <span class="help-block">{{ $errors->first('tanggal_lahir') }}</span>
    @endif
</div>


<!-- jumlah Semester -->
@if ($errors->any())
    <div class="form-group {{ $errors->has('id_semester') ? 'has-error' : 'has-success' }}">
@else
    <div class="form-group">
@endif
    {!! Form::label('id_semester', 'Semester yang ditempuh:', ['class' => 'control-label']) !!}
    @if(count($list_semester) > 0)
        {!! Form::select('id_semester', $list_semester, null, ['class' => 'form-control', 'id' => 'id_semester', 'placeholder' => 'Pilih Semester']) !!}
     @else
       <p>Tidak ada pilihan semester, buat dulu ya...!</p>
   @endif
   @if ($errors->has('id_semester'))
       <span class="help-block">{{ $errors->first('id_semester') }}</span>
   @endif
</div>


<!-- JENIS KELAMIN -->
@if ($errors->any())
<div class="form-group {{ $errors->has('jenis_kelamin') ? 'has-error' : 'has-success' }}">
@else
<div class="form-group">
@endif
    {!! Form::label('jenis_kelamin', 'Jenis Kelamin:', ['class' => 'control-label']) !!}
    <div class="radio">
        <label>{!! Form::radio('jenis_kelamin', 'L') !!} Laki-laki</label>
    </div>
    <div class="radio">
        <label>{!! Form::radio('jenis_kelamin', 'P') !!} Perempuan</label>
    </div>
    @if ($errors->has('jenis_kelamin'))
        <span class="help-block">{{ $errors->first('jenis_kelamin') }}</span>
     @endif
</div>


<!-- TELEPON -->
@if ($errors->any())
<div class="form-group {{ $errors->has('nomor_telepon') ? 'has-error' : 'has-success' }}">
@else
<div class="form-group">
@endif
    {!! Form::label('nomor_telepon', 'Telepon:', ['class' => 'control-label']) !!}
    {!! Form::text('nomor_telepon', null, ['class' => 'form-control']) !!}
    @if ($errors->has('nomor_telepon'))
    <span class="help-block">{{ $errors->first('nomor_telepon') }}</span>
    @endif
</div>


<!-- Jurusan -->
@if ($errors->any())
<div class="form-group {{ $errors->has('jurusan_mahasiswa') ? 'has-error' : 'has-success' }}">
@else
<div class="form-group">
@endif
{!! Form::label('jurusan_mahasiswa', 'Jurusan yang diminati:', ['class' => 'control-label']) !!}
@if(count($list_jurusan) > 0)
    @foreach($list_jurusan as $key => $value)
        <div class="radio" >
            <label>{!! Form::radio('jurusan_mahasiswa[]', $key, null) !!} {{ $value }}</label>

        </div>
    @endforeach
@else
    <p>Tidak ada pilihan Jurusan, buat dulu ya...!</p>
@endif
</div>

<!-- FOTO -->
@if ($errors->any())
<div class="form-group {{ $errors->has('foto') ? 'has-error' : 'has-success' }}">
@else
<div class="form-group">
@endif
    {!! Form::label('foto', 'Foto:') !!}
    {!! Form::file('foto') !!}
    @if ($errors->has('foto'))
        <span class="help-block">{{ $errors->first('foto') }}</span>
    @endif

    <!-- MENAMPILKAN FOTO -->
    @if (isset($mahasiswa))
        @if (isset($mahasiswa->foto))
            <img src="{{ asset('fotoupload/' . $mahasiswa->foto) }}">
        @else
            @if ($mahasiswa->jenis_kelamin == 'L')
                <img src="{{ asset('fotoupload/dummymale.jpg') }}">
            @else
                <img src="{{ asset('fotoupload/dummyfemale.jpg') }}">
            @endif
        @endif
    @endif
</div>

<!-- SUBMIT -->
<div class="form-group">
    {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>