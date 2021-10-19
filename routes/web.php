<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('halo', function() {
//     return 'Halo, Selamat Belajar Laravel!';
// });

// Route::get('halaman-rahasia', function() {
//     return 'Anda sedang melihat <strong>Halaman Rahasia.</strong>';
// })->name('secret');


// Route::get('halaman-rahasia', ['as' => 'secret', function() {
//     return 'Anda sedang melihat <strong>Halaman Rahasia.</strong>';
// }]);

// Route::get('showme-secret', function() {
//     return redirect()->route('secret');
// });


// Route::get('/', function () {
//     return view('pages.homepage');
// });

// Route::get('about', function() {
//     $halaman = 'about';
//     return view('pages.about', compact('halaman'));
// });

// Route::get('mahasiswa', function() {
//     $halaman = 'mahasiswa';
//     $mahasiswa = ['Rasmus Lerdorf',
//         'Taylor Otwell',
//         'Brendan Eich',
//         'John Resig'
//     ];
//     return view('mahasiswa.index', compact('halaman', 'mahasiswa'));
// });

// Route::get('halaman-rahasia', [
//     'as' => 'secret',
//     'uses' => 'RahasiaController@halamanRahasia'
// ]);

// NAMED ROUTE
// Route::get('halaman-rahasia', 'RahasiaController@halamanRahasia')->name('secret');
// Route::get('showme-secret', 'RahasiaController@showMeSecret');


// Route::get('sampledata', function() {
//     DB::table('mahasiswa')->insert([
//         [
//             'nomhsw'          => '1001',
//             'nama_mahasiswa'    => 'Agus Yulianto',
//             'tanggal_lahir' => '1990-02-12',
//             'jenis_kelamin' => 'L',
//             'created_at'    => '2016-03-10 19:10:15',
//             'updated_at'    => '2016-03-10 19:10:15'
//         ],
//         [
//             'nomhsw'          => '1002',
//             'nama_mahasiswa'    => 'Agustina Anggraeni',
//             'tanggal_lahir' => '1990-03-01',
//             'jenis_kelamin' => 'P',
//             'created_at'    => '2016-03-10 19:10:15',
//             'updated_at'    => '2016-03-10 19:10:15'
//         ],
//         [
//             'nomhsw'          => '1003',
//             'nama_mahasiswa'    => 'Bayu Firmansyah',
//             'tanggal_lahir' => '1990-06-17',
//             'jenis_kelamin' => 'L',
//             'created_at'    => '2016-03-10 19:10:15',
//             'updated_at'    => '2016-03-10 19:10:15'
//         ],
//         [
//             'nomhsw'          => '1004',
//             'nama_mahasiswa'    => 'Citra Rahmawati',
//             'tanggal_lahir' => '1991-12-12',
//             'jenis_kelamin' => 'P',
//             'created_at'    => '2016-03-10 19:10:15',
//             'updated_at'    => '2016-03-10 19:10:15'
//         ],
//         [
//             'nomhsw'          => '1005',
//             'nama_mahasiswa'    => 'Dirgantara Laksana',
//             'tanggal_lahir' => '1990-10-10',
//             'jenis_kelamin' => 'L',
//             'created_at'    => '2016-03-10 19:10:15',
//             'updated_at'    => '2016-03-10 19:10:15'
//         ],
//         [
//             'nomhsw'          => '1006',
//             'nama_mahasiswa'    => 'Eko Satrio',
//             'tanggal_lahir' => '1990-07-14',
//             'jenis_kelamin' => 'L',
//             'created_at'    => '2016-03-10 19:10:15',
//             'updated_at'    => '2016-03-10 19:10:15'
//         ],
//         [
//             'nomhsw'          => '1007',
//             'nama_mahasiswa'    => 'Firda Ayu Larasati',
//             'tanggal_lahir' => '1992-02-02',
//             'jenis_kelamin' => 'P',
//             'created_at'    => '2016-03-10 19:10:15',
//             'updated_at'    => '2016-03-10 19:10:15'
//         ],
//         [
//             'nomhsw'          => '1008',
//             'nama_mahasiswa'    => 'Galang Rambu Anarki',
//             'tanggal_lahir' => '1991-05-11',
//             'jenis_kelamin' => 'L',
//             'created_at'    => '2016-03-10 19:10:15',
//             'updated_at'    => '2016-03-10 19:10:15'
//         ],
//         [
//             'nomhsw'          => '1009',
//             'nama_mahasiswa'    => 'Haris Purnomo',
//             'tanggal_lahir' => '1991-10-10',
//             'jenis_kelamin' => 'L',
//             'created_at'    => '2016-03-10 19:10:15',
//             'updated_at'    => '2016-03-10 19:10:15'
//         ],
//         [
//             'nomhsw'          => '1010',
//             'nama_mahasiswa'    => 'Indra Birowo',
//             'tanggal_lahir' => '1991-12-04',
//             'jenis_kelamin' => 'L',
//             'created_at'    => '2016-03-10 19:10:15',
//             'updated_at'    => '2016-03-10 19:10:15'
//         ],
//     ]);
// });

// Iki ISO
// Route::get('/', 'PagesController@homepage');
// Route::get('about', 'PagesController@about');

// Route::get('mahasiswa', 'mahasiswaController@index');
// Route::get('mahasiswa/create', 'mahasiswaController@create');
// Route::get('mahasiswa/{mahasiswa}', 'mahasiswaController@show');
// Route::get('mahasiswa/{mahasiswa}/edit', 'mahasiswaController@edit');
// Route::patch('mahasiswa/{mahasiswa}', 'mahasiswaController@update');
// Route::post('mahasiswa', 'mahasiswaController@store');
// Route::delete('mahasiswa/{mahasiswa}', 'mahasiswaController@destroy');


// Route::get('date-mutator', 'mahasiswaController@dateMutator');


// Bekerja sebelum 29.5
// Route::get('/', 'PagesController@homepage');
// Route::get('about', 'PagesController@about');
// Auth::routes();
// Route::get('/home', 'HomeController@index')->name('home');
// Route::get('mahasiswa/cari', 'mahasiswaController@cari');
// Route::resource('mahasiswa', 'mahasiswaController');
// Route::resource('semester', 'semesterController')->parameters([
//     'semester' => 'semester'
// ]);
// Route::resource('jurusan', 'jurusanController');


Route::get('/', 'PagesController@homepage');
Route::get('about', 'PagesController@about');
Auth::routes(['register' => false]);
Route::get('mahasiswa/cari', 'mahasiswaController@cari');
Route::resource('mahasiswa', 'mahasiswaController');
Route::resource('semester', 'semesterController')->parameters([
    'semester' => 'semester'
]);
Route::resource('jurusan', 'jurusanController');
Route::resource('user', 'UserController');