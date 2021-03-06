<?php

use App\Http\Livewire\Digging;
use App\Http\Livewire\PostList;
use App\Http\Livewire\TopicList;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::get('counter', function () {
    return view('counting');
});

Route::get('posts', PostList::class);
Route::get('diffing', Digging::class);

Route::get('topics', TopicList::class)->name('topic.list');
Route::get('topics/edit/{topic}', TopicEdit::class)->name('topic.edit');
