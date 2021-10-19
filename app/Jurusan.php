<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class jurusan extends Model
{
    protected $table = 'jurusan';

    protected $fillable = ['nama_jurusan'];

    public function mahasiswa() {
        return $this->belongsToMany('App\mahasiswa', 'jurusan_mahasiswa', 'id_jurusan', 'id_mahasiswa');
    }
}
