<?php

// Route::get('kirimemail', function(){
//     \Mail::raw('halo siswa baru', function($message) {
//         $message->to('siswabaru1@gmail.com', 'siswabaru1');
//         $message->subject('Pendaftaran Siswa');
//     });
// });


Route::get('/', 'SiteController@home');
Route::get('/register', 'SiteController@register');
Route::post('/postregister', 'SiteController@postregister');

Route::get('/login', 'AuthController@login')->name('login');
Route::post('/postlogin', 'AuthController@postlogin');
Route::get('/logout', 'AuthController@logout');

Route::group(['middleware' => ['auth', 'checkRole:admin']], function () {
    // admin
    Route::get('/dashboard', 'DashboardController@index');
    Route::get('/siswa', 'SiswaController@index');
    Route::post('/siswa/create', 'SiswaController@create');
    Route::get('/siswa/{siswa}/edit', 'SiswaController@edit')->name('siswa.edit');
    Route::post('/siswa/{siswa}/update', 'SiswaController@update');
    Route::get('/siswa/{siswa}/delete', 'SiswaController@delete')->name('siswa.delete');
    Route::get('/siswa/{siswa}/profile', 'SiswaController@profile'); 
    Route::post('/siswa/{siswa}/addnilai', 'SiswaController@addnilai');
    Route::get('/siswa/{id}/{idmapel}/deletenilai', 'SiswaController@deletenilai');
    Route::get('/siswa/exportExcel', 'SiswaController@exportExcel');
    Route::get('/siswa/exportPdf', 'SiswaController@exportPdf');
    Route::post('/siswa/import', 'SiswaController@importexcel')->name('siswa.import');
    
    // guru controller
    Route::get('/guru/{id}/profile', 'GuruController@profile');

    // post controller
    Route::get('/posts', 'PostController@index')->name('posts.index');
    Route::get('/post/add', [
        'uses' => 'PostController@add',
        'as' => 'posts.add',
    ]);
    // post create
    Route::post('/post/create',[
        'uses' => 'PostController@create',
        'as' => 'posts.create',
    ]);

    
});

Route::group(['middleware' => ['auth', 'checkRole:admin,siswa']], function () {
    Route::get('/dashboard', 'DashboardController@index')->middleware('auth');

});

Route::group(['middleware' => ['auth', 'checkRole:siswa']], function(){
   Route::get('profilesaya', 'SiswaController@profilesaya'); 
});

Route::get('getdatasiswa', [
    'uses' => 'SiswaController@getdatasiswa',
    'as' => 'ajax.get.data.siswa',
]);

Route::get('/{slug}', [
    'uses' => 'SiteController@singlepost',
    'as' => 'site.single.post',
]);