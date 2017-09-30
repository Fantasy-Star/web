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

// 初始欢迎界面
// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/welcome', function () {
    return view('welcome');
});

//畅言
Route::get('/changyan/login', 'ChangyanController@getuserinfo')->name('changyan_login');
Route::get('/changyan/logout', 'ChangyanController@changyan_logout')->name('changyan_logout');

// static_pages
Route::get('/', 'StaticPagesController@home')->name('home');
Route::get('/help', 'StaticPagesController@help')->name('help');
Route::get('/about', 'StaticPagesController@about')->name('about');
Route::get('/sponsor', 'StaticPagesController@sponsor')->name('sponsor');
Route::get('/contact', 'StaticPagesController@contact')->name('contact');
Route::get('/valhalla', 'StaticPagesController@valhalla')->name('valhalla');
Route::get('/bug', 'StaticPagesController@bug')->name('bug');
Route::get('/advice', 'StaticPagesController@advice')->name('advice');

//******* 用户 *******
Route::resource('users', 'UserController');

//消息
Route::get('/notifications/unread', 'NotificationsController@unread')->name('notifications.unread');
Route::get('/notifications', 'NotificationsController@index')->name('notifications.index');
Route::get('/notifications/count', 'NotificationsController@count')->name('notifications.count');

// 注册
Route::get('signup', 'UserController@create')->name('signup');
Route::get('signup/confirm/{token}', 'UserController@confirmEmail')->name('confirm_email');
// 登陆
Route::get('login', 'SessionsController@create')->name('login');
Route::post('login', 'SessionsController@store')->name('login');
Route::delete('logout', 'SessionsController@destroy')->name('logout');

// 状态
Route::resource('statuses', 'StatusesController', ['only' => ['store', 'destroy']]);

// 密码管理
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');

Route::get('/users/{id}/edit_password', 'UserController@editPassword')->name('users.edit_password');
Route::patch('/users/{id}/update_password', 'UserController@updatePassword')->name('users.update_password');

// 关注
Route::get('/users/{user}/followings', 'UserController@followings')->name('users.followings');
Route::get('/users/{user}/followers', 'UserController@followers')->name('users.followers');

Route::post('/users/followers/{user}', 'FollowersController@store')->name('followers.store');
Route::delete('/users/followers/{user}', 'FollowersController@destroy')->name('followers.destroy');

//头像
Route::get('/users/{id}/edit_avatar', 'UserController@editAvatar')->name('users.edit_avatar');

//******* 藏书 *******
Route::resource('books', 'BooksController');

Route::post('/books/order/{book}', 'BorrowController@store')->name('borrow.store');
Route::delete('/books/order/{book}', 'BorrowController@destroy')->name('borrow.destroy');

// Article
Route::get("/articles/create", "ArticleController@create")->name('articles.create');
Route::post("/articles", "ArticleController@store")->name('articles.store');
Route::get("/articles/{id}/edit", "ArticleController@edit")->name('articles.edit');

# ------------------ Topic ------------------------
Route::get('/topics', 'TopicsController@index')->name('topics.index');
Route::get('/topics/create', 'TopicsController@create')->name('topics.create')->middleware('verified_email');
Route::post('/topics', 'TopicsController@store')->name('topics.store')->middleware('verified_email');
Route::get('/topics/{id}/edit', 'TopicsController@edit')->name('topics.edit');
Route::patch('/topics/{id}', 'TopicsController@update')->name('topics.update');
Route::delete('/topics/{id}', 'TopicsController@destroy')->name('topics.destroy');
Route::post('/topics/{id}/append', 'TopicsController@append')->name('topics.append');

# ------------------ ShareLinks --------------------

Route::get('/links/share', 'ShareLinksController@createLink')->name('share_links.create');
Route::get('/share_links/{id}/edit', 'ShareLinksController@edit')->name('share_links.edit');

//*******后台管理*******
//app/Admin/routes