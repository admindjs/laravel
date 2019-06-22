<?php

//Route::get('users','UserController@list');

// 查看指定ID用户
//Route::get('users/{id}','UserController@show');
//
//// 添加用户
//Route::post('users','UserController@add');
//
//// 修改用户
//Route::put('users/{id}','UserController@edit');
//
//// 删除用户
//Route::delete('users/{id}','UserController@del');

//Route::get('db','UserController@db');
Route::group(['prefix'=>'member','namespace'=>'Member'],function($route){
    $route->get('users','UserController@index')->name('member.user.index');
    $route->get('users/create','UserController@create')->name('member.user.create');
    $route->post('users/create','UserController@store')->name('member.user.create');
    $route->get('users/update/{id}','UserController@update')->name('member.user.update')->where(['id'=>'\d+']);
    $route->put('users/update/{id}','UserController@edit')->name('member.user.update')->where(['id'=>'\d+']);
    $route->delete('users/delete/{id?}','UserController@del')->name('member.user.del')->where(['id'=>'\d+']);
    //$route->delete('users/delete','UserController@delall')->name('member.user.delall');
});

