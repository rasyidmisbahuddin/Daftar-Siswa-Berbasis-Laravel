 @extends('template')

 @section('main')
     <div id="semester">
         <h2>Semester</h2>

         @include('_partial.flash_message')

         @if (count($semester_list) > 0)
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Semester</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 0; ?>
                    <?php foreach($semester_list as $semester): ?>
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $semester->nama_semester }}</td>
                        <td>
                            <div class="box-button">
                                {{ link_to('semester/' . $semester->id . '/edit', 'Edit', ['class' => 'btn btn-warning btn-sm']) }}
                            </div>
                            <div class="box-button">
                                {!! Form::open(['method' => 'DELETE', 'action' => ['semesterController@destroy', $semester->id]]) !!}
                                    {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                                {!! Form::close() !!}
                            </div>
                        </td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        @else
            <p>Tidak ada data semester.</p>
        @endif

        <div class="tombol-nav">
            <a href="semester/create" class="btn btn-primary">Tambah semester</a>
        </div>

    </div> <!-- / #semester -->
@stop

@section('footer')
   @include('footer')
@stop