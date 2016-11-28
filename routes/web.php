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
Route::group(['middleware' => ['language']], function () {
    //
    Route::get('about', function () {
            return view('pages.about');
        });
    Route::get('contact', function () {
        return view('pages.contact');
    });
    Auth::routes();

    Route::get('/', 'ItemsController@index');
    //Items route
    Route::get('items', 'ItemsController@index');
    Route::post('items/{user}', 'ItemsController@store');
    Route::put('editItem', 'ItemsController@update');
    Route::get('deleteItem/{id}', 'ItemsController@delete');
    Route::get('needPurchasedList', 'ItemsController@needPurchasedList');
    Route::get('updatePurchaseStatus/{id}', 'ItemsController@updatePurchaseStatus');

    //Luggages routes
    Route::get('luggages', 'LuggagesController@index');
    Route::post('luggages/{user}', 'LuggagesController@store');
    Route::put('editLuggage/{id}', 'LuggagesController@update');
    Route::get('deleteLuggage/{id}', 'LuggagesController@delete');

    //Luggage's items route
    Route::get('manageItemsToLuggage/{id}', 'LuggagesController@manageItemsToLuggage');
    Route::get('removeItemsFromLuggage/{luggage_id}/{item_id}', 'LuggagesController@removeItemsFromLuggage');
    Route::get('assignItemToLuggage/{luggage_id}/{item_id}', 'LuggagesController@assignItemToLuggage');

});
