<?php

// auth routes
Auth::routes();

Route::group(['middleware' => 'auth'], function (){
    // index route
    Route::get('/', 'HomeController@index');
    // home route
    Route::get('/home', 'HomeController@index')->name('home');
    //user route
    Route::prefix('users')->group(function(){
        Route::get('view', 'Backend\UserController@view')->name('users.view');
        Route::get('add', 'Backend\UserController@add')->name('users.add');
        Route::post('store', 'Backend\UserController@store')->name('users.store');
        Route::get('edit/{id}', 'Backend\UserController@edit')->name('users.edit');
        Route::post('update/{id}', 'Backend\UserController@update')->name('users.update');
        Route::get('delete/{id}', 'Backend\UserController@delete')->name('users.delete');
    });
    // profile route
    Route::prefix('profiles')->group(function(){
        Route::get('view', 'Backend\ProfileController@view')->name('profiles.view');
        Route::get('edit', 'Backend\ProfileController@edit')->name('profiles.edit');
        Route::post('store', 'Backend\ProfileController@update')->name('profiles.update');
        Route::get('password/view', 'Backend\ProfileController@passwordView')->name('profiles.password.view');
        Route::post('password/update', 'Backend\ProfileController@passwordUpdate')->name('profiles.password.update');
    });
//    Suppliers routes
    Route::prefix('suppliers')->group(function(){
        Route::get('view', 'Backend\SupplierController@view')->name('suppliers.view');
        Route::get('add', 'Backend\SupplierController@add')->name('suppliers.add');
        Route::post('store', 'Backend\SupplierController@store')->name('suppliers.store');
        Route::get('edit/{id}', 'Backend\SupplierController@edit')->name('suppliers.edit');
        Route::post('update/{id}', 'Backend\SupplierController@update')->name('suppliers.update');
        Route::get('delete/{id}', 'Backend\SupplierController@delete')->name('suppliers.delete');
    });
    //    Customers roputes
    Route::prefix('customers')->group(function(){
        Route::get('view', 'Backend\CustomerController@view')->name('customers.view');
        Route::get('add', 'Backend\CustomerController@add')->name('customers.add');
        Route::post('store', 'Backend\CustomerController@store')->name('customers.store');
        Route::get('edit/{id}', 'Backend\CustomerController@edit')->name('customers.edit');
        Route::post('update/{id}', 'Backend\CustomerController@update')->name('customers.update');
        Route::get('delete/{id}', 'Backend\CustomerController@delete')->name('customers.delete');
    });
});
