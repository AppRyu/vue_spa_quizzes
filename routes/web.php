<?php

Route::get('/', function () {
  return view('index');
});
Route::get('/quiz', function () {
  return view('index');
});
Route::get('/mypage', function () {
  return view('index');
})->middleware('auth');

Route::get('/keyword', function () {
  return view('index');
});

Route::get('/login', function () {
  return view('auth.login.index');
})->name('login');

Route::get('/register', function () {
  return view('auth.register.index');
});

Route::post('/register', 'Auth\RegisterController@register');
Route::post('/login', 'Auth\LoginController@login');
Route::post('/logout', 'Auth\LoginController@logout');

Route::post('/insertRanking', 'Web\RankingController@insertRanking');

