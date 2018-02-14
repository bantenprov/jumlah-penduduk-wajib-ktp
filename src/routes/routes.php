<?php

Route::group(['prefix' => 'jumlah-penduduk-wajib-ktp', 'middleware' => ['web']], function() {

    $controllers = (object) [
        'index'     => 'Bantenprov\JPWajibKTP\Http\Controllers\JPWajibKTPController@index',
        'create'     => 'Bantenprov\JPWajibKTP\Http\Controllers\JPWajibKTPController@create',
        'store'     => 'Bantenprov\JPWajibKTP\Http\Controllers\JPWajibKTPController@store',
        'show'      => 'Bantenprov\JPWajibKTP\Http\Controllers\JPWajibKTPController@show',
        'update'    => 'Bantenprov\JPWajibKTP\Http\Controllers\JPWajibKTPController@update',
        'destroy'   => 'Bantenprov\JPWajibKTP\Http\Controllers\JPWajibKTPController@destroy',
    ];

    Route::get('/',$controllers->index)->name('jumlah-penduduk-wajib-ktp.index');
    Route::get('/create',$controllers->create)->name('jumlah-penduduk-wajib-ktp.create');
    Route::post('/store',$controllers->store)->name('jumlah-penduduk-wajib-ktp.store');
    Route::get('/{id}',$controllers->show)->name('jumlah-penduduk-wajib-ktp.show');
    Route::put('/{id}/update',$controllers->update)->name('jumlah-penduduk-wajib-ktp.update');
    Route::post('/{id}/delete',$controllers->destroy)->name('jumlah-penduduk-wajib-ktp.destroy');

});

