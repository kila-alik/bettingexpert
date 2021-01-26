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
Route::get ('sport/{id}/{date}', 'IndexController@indexsport')->name('IndexSport');

// Route::get('/', 'IndexController@index')->name('Index');
// Route::get('/{id?}', 'IndexController@index')->name('Index');
// Route::resource('/', 'IndexController');
Route::resource('/', 'IndexController', [
                                          'only' => ['index'],
                                          'names' => [
                                                    'index'=>'home'
                                                    ]
                                          ]);

// Route::get ('sport/{id}', 'IndexController@index')->name('IndexSport');
// Route::get ('sport/{id}', 'SportController@indexsport')->name('IndexSport');

Auth::routes();

Route::get('/profile', 'HomeController@index')->name('profile');
Route::match (['get', 'post'], 'profile/pass/{id}', 'Admin\AdminController@change_pass')->name('ChangePass');
Route::match (['get', 'post'], 'profile/deposit/{id}', 'Admin\AdminController@deposit')->name('Deposit');

//admin
// Route::group(['prefix' => 'admin', 'middleware'=>['auth']], function(){
Route::group(['prefix' => 'admin', 'middleware'=>['auth','admin']], function(){
  //    /admin/
  Route::get ('/', 'Admin\AdminController@index')->name('AdminList');

  //    /admin/users
  Route::get ('users', 'Admin\AdminController@list')->name('UsersList');
  Route::get ('user/{id}', 'Admin\AdminController@detail')->name('UserDetail');
  Route::match (['get', 'post'], 'user/edit/{id}', 'Admin\AdminController@edit')->name('UserEdit');
  Route::post ('user/del/{id}', 'Admin\AdminController@del')->name('UserDel');
  Route::post ('user/pass/{id}', 'Admin\AdminController@pass')->name('UserPass');

  //    /admin/sport
  Route::get ('sport', 'SportController@list')->name('SportList');
  Route::get ('sport/{id}', 'SportController@detail')->name('SportDetail');
  Route::match (['get', 'post'], 'sport/edit/{id}', 'SportController@edit')->name('SportEdit');
  // Route::match (['get', 'post'], 'sport/del/{id}', 'SportController@del')->name('SportDel');

  //    /admin/country
  Route::get ('country', 'CountryController@list')->name('CountryList');
  Route::get ('country/{id}', 'CountryController@detail')->name('CountryDetail');
  Route::match (['get', 'post'], 'country/edit/{id}', 'CountryController@edit')->name('CountryEdit');
  // Route::match (['get', 'post'], 'country/del/{id}', 'CountryController@del')->name('CountryDel');

  //    /admin/championship
  Route::get ('championship', 'ChampionshipController@list')->name('ChampionshipList');
  Route::get ('championship/{id}', 'ChampionshipController@detail')->name('ChampionshipDetail');
  Route::match (['get', 'post'], 'championship/edit/{id}', 'ChampionshipController@edit')->name('ChampionshipEdit');
  // Route::match (['get', 'post'], 'championship/del/{id}', 'ChampionshipController@del')->name('ChampionshipDel');

  //    /admin/command
  Route::get ('command', 'CommandController@list')->name('CommandList');
  Route::get ('command/{id}', 'CommandController@detail')->name('CommandDetail');
  Route::match (['get', 'post'], 'command/edit/{id}', 'CommandController@edit')->name('CommandEdit');
  // Route::match (['get', 'post'], 'command/del/{id}', 'CommandController@del')->name('CommandDel');

  //    /admin/forecast
  Route::get ('forecast', 'ForecastController@list')->name('ForecastList');
  Route::get ('forecast/{id}', 'ForecastController@detail')->name('ForecastDetail');
  Route::match (['get', 'post'], 'forecast/edit/{id}', 'ForecastController@edit')->name('ForecastEdit');
  Route::match (['get', 'post'], 'forecast/edit1/{id}', 'ForecastController@edit')->name('ForecastEdit1');
  Route::match (['get', 'post'], 'forecast/edit2/{id}', 'ForecastController@edit')->name('ForecastEdit2');
  // спросить у Леши про get , можно ли им удалять
  Route::post ('forecast/del/{id}', 'ForecastController@del')->name('ForecastDel');

  Route::match (['get', 'post'], 'forecast/edit_one_page/{id}', 'ForecastController@editOnePage')->name('ForecastEditOnePage');
  Route::match (['get', 'post'], 'forecast/getChampsCommandsAjax/{sport}/{country}', 'ForecastController@getChampsCommandsAjax')->name('ForecastChampsCommandsAjax');
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
