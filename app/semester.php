<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class semester extends Model
{
    protected $table = 'semester';

    protected $fillable = ['nama_semester'];

    public function mahasiswa() {
        return $this->hasMany('App\mahasiswa', 'id_semester');
    }
}
