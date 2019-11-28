<?php

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
    Route::get('/siswa/{siswa}/edit', 'SiswaController@edit');
    Route::post('/siswa/{siswa}/update', 'SiswaController@update');
    Route::get('/siswa/{siswa}/delete', 'SiswaController@delete');
    Route::get('/siswa/{siswa}/profile', 'SiswaController@profile'); 
    Route::post('/siswa/{siswa}/addnilai', 'SiswaController@addnilai');
    Route::get('/siswa/{id}/{idmapel}/deletenilai', 'SiswaController@deletenilai');
    Route::get('/siswa/exportExcel', 'SiswaController@exportExcel');
    Route::get('/siswa/exportPdf', 'SiswaController@exportPdf');
    
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

Route::get('/{slug}', [
    'uses' => 'SiteController@singlepost',
    'as' => 'site.single.post',
]);