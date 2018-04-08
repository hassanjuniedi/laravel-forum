<?php


use App\Profile;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function() {
    return Profile::find(3);
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix'=> 'admin', 'middleware'=> 'auth'], function (){

    Route::get('/posts',[
        'uses' => 'PostController@index',
        'as' => 'post.index'
    ]);

    Route::get('/posts/trashed',[
        'uses' => 'PostController@trashed',
        'as' => 'post.trashed'
    ]);

    Route::get('/posts/kill/{id}',[
        'uses' => 'PostController@kill',
        'as' => 'post.kill'
    ]);

    Route::get('/posts/restore/{id}',[
        'uses' => 'PostController@restore',
        'as' => 'post.restore'
    ]);

    Route::get('/post/create',[
        'uses' => 'PostController@create',
        'as' => 'post.create'
    ]);

    Route::get('/post/edit/{id}',[
        'uses' => 'PostController@edit',
        'as' => 'post.edit'
    ]);

    Route::post('/post/update/{id}',[
        'uses' => 'PostController@update',
        'as' => 'post.update'
    ]);

    Route::get('/post/delete/{id}',[
        'uses' => 'PostController@destroy',
        'as' => 'post.delete'
    ]);

    Route::post('/post/store',[
        'uses' => 'PostController@store',
        'as' => 'post.store'
    ]);

    Route::get('/categories',[
        'uses' => 'CategoryController@index',
        'as' => 'category.index'
    ]);

    Route::get('/category/create',[
        'uses' => 'CategoryController@create',
        'as' => 'category.create'
    ]);
    Route::post('/category/store',[
        'uses' => 'CategoryController@store',
        'as' => 'category.store'
    ]);
    Route::get('/category/edit/{id}',[
        'uses' => 'CategoryController@edit',
        'as' => 'category.edit'
    ]);
    Route::post('/category/update/{id}',[
        'uses' => 'CategoryController@update',
        'as' => 'category.update'
    ]);
    Route::get('/category/delete/{id}',[
        'uses' => 'CategoryController@destroy',
        'as' => 'category.delete'
    ]);

    Route::get('/tags',[
        'uses' => 'TagController@index',
        'as' => 'tag.index'
    ]);

    Route::get('/tag/create',[
        'uses' => 'TagController@create',
        'as' => 'tag.create'
    ]);
    Route::post('/tag/store',[
        'uses' => 'TagController@store',
        'as' => 'tag.store'
    ]);
    Route::get('/tag/edit/{id}',[
        'uses' => 'TagController@edit',
        'as' => 'tag.edit'
    ]);
    Route::post('/tag/update/{id}',[
        'uses' => 'TagController@update',
        'as' => 'tag.update'
    ]);
    Route::get('/tag/delete/{id}',[
        'uses' => 'TagController@destroy',
        'as' => 'tag.delete'
    ]);

    Route::get('/users', [
        'uses' => 'UserController@index',
        'as' => 'user.index'
    ]);
    Route::get('/users/create', [
        'uses' => 'UserController@create',
        'as' => 'user.create'
    ]);
    Route::post('/users/store', [
        'uses' => 'UserController@store',
        'as' => 'user.store'
    ]);

    Route::get('/users/toggle-admin/{id}', [
        'uses' => 'UserController@toggleAdmin',
        'as' => 'user.toggle.admin'
    ]);

    Route::get('/users/profile', [
        'uses' => 'ProfileController@index',
        'as' => 'user.profile'
    ]);

    Route::post('/users/profile/update', [
        'uses' => 'ProfileController@update',
        'as' => 'user.profile.update'
    ]);


});
