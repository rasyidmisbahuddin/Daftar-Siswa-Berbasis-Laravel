<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mahasiswa extends Model
{
    protected $table = 'mahasiswa';

    protected $fillable = [
        'nomhsw',
        'nama_mahasiswa',
        'tanggal_lahir',
        'jenis_kelamin',
        'id_semester',
        'foto'
    ];

    protected $dates = ['tanggal_lahir'];

    // Relasi mahasiswa - jurusan
    public function jurusan() {
        return $this->belongsToMany('App\jurusan', 'jurusan_mahasiswa', 'id_mahasiswa', 'id_jurusan')->withTimeStamps();
    }


    // Relasi mahasiswa - semester
    public function semester() {
        return $this->belongsTo('App\semester', 'id_semester');
    }


    // Relasi mahasiswa - Telepon
    public function telepon() {
        return $this->hasOne('App\Telepon', 'id_mahasiswa');
    }


    // Accessor
    public function getNamamahasiswaAttribute($nama_mahasiswa) {
        return ucwords($nama_mahasiswa);
    }


    // Mutator
    public function setNamamahasiswaAttribute($nama_mahasiswa) {
        $this->attributes['nama_mahasiswa'] = strtolower($nama_mahasiswa);
    }


    // Accessor
    public function getjurusanmahasiswaAttribute() {
        return $this->jurusan->pluck('id')->toArray();
    }

    // Scope semester
    public function scopesemester($query, $id_semester) {
        return $query->where('id_semester', $id_semester);
    }

    // Scope Jenis Kelamin
    public function scopeJenisKelamin($query, $jenis_kelamin) {
        return $query->where('jenis_kelamin', $jenis_kelamin);
    }

}
