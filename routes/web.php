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



Route::group(['middleware'=>'auth'],function(){


Route::get('/', function () {
        return view('index');
    });
    Route::get('/dashboard', function () {
     return view('index');
 });

Route::get('/logout','Auth\LoginController@logout');

Route::group([
    'prefix' => 'clienti',
], function () {
    Route::get('/', 'ClientisController@index')
         ->name('clientis.clienti.index');
    Route::get('/create','ClientisController@create')
         ->name('clientis.clienti.create');
    Route::get('/show/{clienti}','ClientisController@show')
         ->name('clientis.clienti.show')->where('id', '[0-9]+');
    Route::get('/{clienti}/edit','ClientisController@edit')
         ->name('clientis.clienti.edit')->where('id', '[0-9]+');
    Route::post('/', 'ClientisController@store')
         ->name('clientis.clienti.store');
    Route::put('clienti/{clienti}', 'ClientisController@update')
         ->name('clientis.clienti.update')->where('id', '[0-9]+');
    Route::delete('/clienti/{clienti}','ClientisController@destroy')
         ->name('clientis.clienti.destroy')->where('id', '[0-9]+');
});





Route::group([
    'prefix' => 'vendors',
], function () {
    Route::get('/', 'CasaEditricesController@index')
         ->name('casa__editrices.casa__editrice.index');
    Route::get('/create','CasaEditricesController@create')
         ->name('casa__editrices.casa__editrice.create');
    Route::get('/show/{casaEditrice}','CasaEditricesController@show')
         ->name('casa__editrices.casa__editrice.show')->where('id', '[0-9]+');
    Route::get('/{casaEditrice}/edit','CasaEditricesController@edit')
         ->name('casa__editrices.casa__editrice.edit')->where('id', '[0-9]+');
    Route::post('/', 'CasaEditricesController@store')
         ->name('casa__editrices.casa__editrice.store');
    Route::put('casa__editrice/{casaEditrice}', 'CasaEditricesController@update')
         ->name('casa__editrices.casa__editrice.update')->where('id', '[0-9]+');
    Route::delete('/casa__editrice/{casaEditrice}','CasaEditricesController@destroy')
         ->name('casa__editrices.casa__editrice.destroy')->where('id', '[0-9]+');
});


Route::get('{id}/manage-profile','CasaEditricesController@edit');



Route::group([
     'prefix' => 'autori',
 ], function () {
     Route::get('/', 'AutorisController@index')
          ->name('autoris.autori.index');
     Route::get('/create','AutorisController@create')
          ->name('autoris.autori.create');
     Route::get('/show/{autori}','AutorisController@show')
          ->name('autoris.autori.show')->where('id', '[0-9]+');
     Route::get('/{autori}/edit','AutorisController@edit')
          ->name('autoris.autori.edit')->where('id', '[0-9]+');
     Route::post('/', 'AutorisController@store')
          ->name('autoris.autori.store');
     Route::put('autori/{autori}', 'AutorisController@update')
          ->name('autoris.autori.update')->where('id', '[0-9]+');
     Route::delete('/autori/{autori}','AutorisController@destroy')
          ->name('autoris.autori.destroy')->where('id', '[0-9]+');
 });
 
 Route::group([
     'prefix' => 'categorie',
 ], function () {
     Route::get('/', 'CategoriesController@index')
          ->name('categories.categorie.index');
     Route::get('/create','CategoriesController@create')
          ->name('categories.categorie.create');
     Route::get('/show/{categorie}','CategoriesController@show')
          ->name('categories.categorie.show')->where('id', '[0-9]+');
     Route::get('/{categorie}/edit','CategoriesController@edit')
          ->name('categories.categorie.edit')->where('id', '[0-9]+');
     Route::post('/', 'CategoriesController@store')
          ->name('categories.categorie.store');
     Route::put('categorie/{categorie}', 'CategoriesController@update')
          ->name('categories.categorie.update')->where('id', '[0-9]+');
     Route::delete('/categorie/{categorie}','CategoriesController@destroy')
          ->name('categories.categorie.destroy')->where('id', '[0-9]+');
 });



 Route::group([
     'prefix' => 'spartiti_libri',
 ], function () {
     Route::get('/', 'SpartitoLibrosController@index')
          ->name('spartito_libros.spartito_libro.index');
     Route::get('/create','SpartitoLibrosController@create')
          ->name('spartito_libros.spartito_libro.create');
     Route::get('/show/{spartitoLibro}','SpartitoLibrosController@show')
          ->name('spartito_libros.spartito_libro.show')->where('id', '[0-9]+');
     Route::get('/{spartitoLibro}/edit','SpartitoLibrosController@edit')
          ->name('spartito_libros.spartito_libro.edit')->where('id', '[0-9]+');
     Route::post('/', 'SpartitoLibrosController@store')
          ->name('spartito_libros.spartito_libro.store');
     Route::put('spartito_libro/{spartitoLibro}', 'SpartitoLibrosController@update')
          ->name('spartito_libros.spartito_libro.update')->where('id', '[0-9]+');
     Route::delete('/spartito_libro/{spartitoLibro}','SpartitoLibrosController@destroy')
          ->name('spartito_libros.spartito_libro.destroy')->where('id', '[0-9]+');
 });



Route::group([
    'prefix' => 'users',
], function () {
    Route::get('/', 'UsersController@index')
         ->name('users.user.index');
    Route::get('/create','UsersController@create')
         ->name('users.user.create');
    Route::get('/show/{user}','UsersController@show')
         ->name('users.user.show')->where('id', '[0-9]+');
    Route::get('/{user}/edit','UsersController@edit')
         ->name('users.user.edit')->where('id', '[0-9]+');
    Route::post('/', 'UsersController@store')
         ->name('users.user.store');
    Route::put('user/{user}', 'UsersController@update')
         ->name('users.user.update')->where('id', '[0-9]+');
    Route::delete('/user/{user}','UsersController@destroy')
         ->name('users.user.destroy')->where('id', '[0-9]+');
});

Route::group([
     'prefix' => 'attributi_prodottis',
 ], function () {
     Route::get('/', 'AttributiProdottisController@index')
          ->name('attributi_prodottis.attributi_prodotti.index');
     Route::get('/create','AttributiProdottisController@create')
          ->name('attributi_prodottis.attributi_prodotti.create');
     Route::get('/show/{attributiProdotti}','AttributiProdottisController@show')
          ->name('attributi_prodottis.attributi_prodotti.show')->where('id', '[0-9]+');
     Route::get('/{attributiProdotti}/edit','AttributiProdottisController@edit')
          ->name('attributi_prodottis.attributi_prodotti.edit')->where('id', '[0-9]+');
     Route::post('/', 'AttributiProdottisController@store')
          ->name('attributi_prodottis.attributi_prodotti.store');
     Route::put('attributi_prodotti/{attributiProdotti}', 'AttributiProdottisController@update')
          ->name('attributi_prodottis.attributi_prodotti.update')->where('id', '[0-9]+');
     Route::delete('/attributi_prodotti/{attributiProdotti}','AttributiProdottisController@destroy')
          ->name('attributi_prodottis.attributi_prodotti.destroy')->where('id', '[0-9]+');
 });
 Route::group([
     'prefix' => 'prodotti_accessoris',
 ], function () {
     Route::get('/', 'ProdottiAccessorisController@index')
          ->name('prodotti_accessoris.prodotti_accessori.index');
     Route::get('/create','ProdottiAccessorisController@create')
          ->name('prodotti_accessoris.prodotti_accessori.create');
     Route::get('/show/{prodottiAccessori}','ProdottiAccessorisController@show')
          ->name('prodotti_accessoris.prodotti_accessori.show')->where('id', '[0-9]+');
     Route::get('/{prodottiAccessori}/edit','ProdottiAccessorisController@edit')
          ->name('prodotti_accessoris.prodotti_accessori.edit')->where('id', '[0-9]+');
     Route::post('/', 'ProdottiAccessorisController@store')
          ->name('prodotti_accessoris.prodotti_accessori.store');
     Route::put('prodotti_accessori/{prodottiAccessori}', 'ProdottiAccessorisController@update')
          ->name('prodotti_accessoris.prodotti_accessori.update')->where('id', '[0-9]+');
     Route::delete('/prodotti_accessori/{prodottiAccessori}','ProdottiAccessorisController@destroy')
          ->name('prodotti_accessoris.prodotti_accessori.destroy')->where('id', '[0-9]+');
          
 });

     

});
//Route::get('{any}', 'LexaController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/populateattributi','ProdottiAccessorisController@populateAttributiAjax')->name('populateattributi');









