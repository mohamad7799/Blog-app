<?php

use App\Http\Controllers\Blog;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',function()
{
    return view('home');
})->name('home');

Route::get('/cars',function()
{
    return view('categories.cars');
})->name('cars');

Route::get('/games',function()
{
    return view('categories.games');
})->name('games');




// Route::resource('/post',Blog::class);


Route::get('/post',[Blog::class,'create'] )->name('show_form');
Route::post('/post',[Blog::class,'store'])->name('store_data');

Route::get('/view-data',[Blog::class,'index'])->name('view-data');

Route::get('/delete/{id}',[Blog::class,'destroy'])->name('delete-blog');

Route::get('/search',[Blog::class,'search'])->name('search-data');

Route::get('/update_paje/{id}',[Blog::class,'edit'])->name('form-edit');

Route::post('/update/{id}',[Blog::class,'update'])->name('update-info-form');




// Route::get('/post/create',[Blog::class,'create']);



Route::get('/contact-us',function()
{
    return view('contact_us');
})->name('contact');




