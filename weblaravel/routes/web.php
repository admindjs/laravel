<?php


Route::group(['prefix'=>'member','namespace'=>'Member'],function($route){
    //用户登录显示
    $route->get('login','LoginController@index')->name('admin.login');
    //用户处理验证
    $route->post('login','LoginController@login')->name('admin.login');
    //后台用户列表展示
    $route->get('users','UserController@index')->name('member.user.index');
    //新建用户显示
    $route->get('users/create','UserController@create')->name('member.user.create');
    //处理添加用户
    $route->post('users/create','UserController@store')->name('member.user.create');
    //修改用户显事
    $route->get('users/update/{id}','UserController@update')->name('member.user.update')->where(['id'=>'\d+']);
    //put更新数据
    $route->put('users/update/{id}','UserController@edit')->name('member.user.update')->where(['id'=>'\d+']);
    //删除数据
    $route->delete('users/delete/{id?}','UserController@del')->name('member.user.del')->where(['id'=>'\d+']);

    $route->delete('users/deletes/{id?}','UserController@really')->name('member.user.really')->where(['id'=>'\d+']);
    $route->get('users/recover/show','UserController@show')->name('member.user.show');
    $route->get('users/recover/{id?}','UserController@recover')->name('member.user.recover')->where(['id'=>'\d+']);

});

