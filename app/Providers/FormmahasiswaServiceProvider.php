<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\semester;
use App\jurusan;

class FormmahasiswaServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('mahasiswa.form', function($view) {
            $view->with('list_semester', semester::pluck('nama_semester', 'id'));
            $view->with('list_jurusan', jurusan::pluck('nama_jurusan', 'id'));
        });

        view()->composer('mahasiswa.form_pencarian', function($view) {
             $view->with('list_semester', semester::pluck('nama_semester', 'id'));
        });
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
