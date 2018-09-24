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

Route::get('/', function () {
    $view = view('welcome');
    // Dispatcherクラス経由でEventを実行する場合
    \Event::dispatch(new \App\Events\PublishProcessor(1));
    return $view;
});

Route::get('/pdf', 'PdfGeneratorController');
