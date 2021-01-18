<?php

use Illuminate\Http\Request;

Route::get("product",'ProductController@index');
Route::get("product/add",'ProductController@create');
Route::post("product/store",'ProductController@store')->name("storeproduct");


Route::get("category",'CategoryController@index');
Route::get("category/add",'CategoryController@create');
Route::post("category/store",'CategoryController@store')->name("storecategory");
