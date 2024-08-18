<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'App\Http\Controllers\HomeController@index')->name("home.index");

Route::get('/about', function () {
    $data1 = "About us - Online Store";
    $data2 = "About us";
    $description = "This is an about page ...";
    $author = "Developed by: Jose Tordecilla";
    return view('home.about')->with("title", $data1)
    ->with("subtitle", $data2)
    ->with("description", $description)
    ->with("author", $author);
   })->name("home.about"); 


Route::get('/contact', function () {
    $title = "Contact us- Online Store";
    $subtitle = "We are a message away";
    $email = "silco@si.co";
    $address = "Silicon Valley, USA";
    $phoneNumber = "+01 3005621";
    return view('home.contact')->with("title", $title)
    ->with("subtitle", $subtitle)
    ->with("email", $email)
    ->with("address", $address)
    ->with("phoneNumber", $phoneNumber);
   })->name("home.contact"); 

Route::get('/products', 'App\Http\Controllers\ProductController@index')->name("product.index");
Route::get('/products/create', 'App\Http\Controllers\ProductController@create')->name("product.create");
Route::post('/products/save', 'App\Http\Controllers\ProductController@save')->name("product.save"); 
Route::get('/products/success', 'App\Http\Controllers\ProductController@success')->name("product.success");
Route::get('/products/{id}', 'App\Http\Controllers\ProductController@show')->name("product.show"); 
