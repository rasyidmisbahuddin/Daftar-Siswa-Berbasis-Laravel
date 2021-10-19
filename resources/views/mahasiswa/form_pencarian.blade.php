<div id="pencarian">
{!! Form::open(['url' => 'mahasiswa/cari', 'method' => 'GET', 'id' => 'form-pencarian']) !!}
        <div class="row">
         <div class="col-md-2">
             {!! Form::select('id_kelas', $list_semester, (! empty($id_semester) ? $id_kelas : null), ['id' => 'id_semester', 'class' => 'form-control', 'placeholder' => '-Semester-']) !!}
         </div>

         <div class="col-md-2">
             {!! Form::select('jenis_kelamin', ['L' => 'Laki-laki', 'P' => 'Perempuan'], (! empty($jenis_kelamin) ? $jenis_kelamin : null), ['id' => 'jenis_kelamin', 'class' => 'form-control', 'placeholder' => '-Jenis Kelamin-']) !!}
        </div>

        <div class="col-md-8">
            <div class="input-group" input-group-lg w-25 mx-auto >
            {!! Form:: text('kata_kunci', (! empty($kata_kunci)) ? $kata_kunci : null,['class' => 'form-control', 'placeholder' => 'Masukkan nama mahasiswa yang ingin dicari']) !!}
            <span class="input-group-btn">
            {!! Form::button('Cari', ['class' => 'btn btn-default', 'type' => 'submit']) !!}
            </span>
            </div>
        </div>
    </div>
{!! Form::close() !!}
</div>