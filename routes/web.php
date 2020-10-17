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

Route::resource('/', 'IndexController', [
                                          'only' => ['index'],
                                          'names' => [
                                                    'index'=>'home'
                                                    ]
                                          ]);

/*
*   /control-panel
*/
Route::group(['prefix' => 'control-panel'], function(){
  Route::get ('/', 'Admin\AdminController@index')->name('AdminList');

  //    /control-panel/country
  Route::get ('country', 'CountryController@list')->name('CountryList');
  Route::get ('country/{id}', 'CountryController@detail')->name('CountryDetail');
  Route::match (['get', 'post'], 'country/edit/{id}', 'CountryController@edit')->name('CountryEdit');
  Route::match (['get', 'post'], 'country/del/{id}', 'CountryController@del')->name('CountryDel');


});



// Route::group(['prefix'=>'control-panel', 'middleware'=>['auth','admin']], function(){
// * Admin Routes
    // Route::get('/', ['uses'=>'Admin\AdminController@index', 'as'=>'control-panel']);
    //
    // Route::resource('/forecasts', 'Admin\ForecastsController')->except(['show']);
    // Route::post('/forecasts/update-result/{id}', 'Admin\ForecastsController@updateResult')->name('forecasts.updateResult');
    // Route::get('/forecasts/change-status/{id}/{status}', 'Admin\ForecastsController@changeStatus')->name('forecasts.changeStatus');
    // Route::get('/forecasts/change-paid/{id}/{paid}', 'Admin\ForecastsController@changePaid')->name('forecasts.changePaid');
    // Route::resource('/sort', 'Admin\SortController')->except(['create', 'show']);
    // Route::post('/sorts/get', 'Admin\SortController@getSorts');
    //
    // Route::resource('/news', 'Admin\NewsController');
    // Route::resource('/news-category', 'Admin\NewsCategoryController');
    //
    // Route::resource('/users', 'Admin\UsersController');
    // Route::post('/users/add-user', 'Admin\UsersController@addUser');
    // Route::post('/users/update-user', 'Admin\UsersController@updateUser');
    // Route::post('/users/get-user', 'Admin\UsersController@getUser');
    //
    // Route::get('/forecasters', 'Admin\ForecastersController@index')->name('forecasters.index');
    //
    // Route::resource('/reviews', 'Admin\ReviewsController');
    // Route::post('/reviews/confirm', ['uses'=>'Admin\ReviewsController@confirm', 'as'=>'reviews.confirm']);




// Route::get('/', ['uses'=>'IndexController@index']);

// Route::get('/', function () {
//     return view('bett.index');
// });
