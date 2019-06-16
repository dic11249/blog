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

// 首頁
Route::get('/', function () {
    return view('index');
});

// 關於我們
Route::get('/about', function () {
    return view('about');
});

// 聯絡我們
Route::get('/contact', function () {
    return view('contact');
});

// 文章列表首頁  view(資料夾)->posts(資料夾)->list(檔案)
Route::get('/posts', function () {
    return view('posts.list');
});

// 指定文章並帶入文章id  /posts/9487
Route::get('/posts/{id}', function ($id) {
    return view('posts.show');
});
