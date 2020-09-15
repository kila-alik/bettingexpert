<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/


Route::get('/', ['uses'=>'IndexController@show', 'as'=>'index']);
Route::get('/news', ['uses'=>'NewsController@index', 'as'=>'news']);
Route::get('/news/category/{category?}', ['uses'=>'NewsController@index', 'as'=>'news.category']);
Route::get('/news/{alias}', ['uses'=>'NewsController@show', 'as'=>'newsShow']);
Route::get('/sort/{sort_alias}', ['uses'=>'ForecastController@ShowForecastsBySort', 'as'=>'sort']);
Route::get('/sport/{sport_alias?}', ['uses'=>'ForecastController@ShowForecastsBySport', 'as'=>'sport']);
Route::get('/prognoz/{alias}', ['uses'=>'ForecastController@show', 'as'=>'forecast']);
Route::get('/prognoz/{sort}/{alias}', ['uses'=>'ForecastController@show', 'as'=>'forecastWsort']);
Route::get('/about-us', ['uses'=>'IndexController@aboutUs', 'as'=>'aboutUs']);
Route::get('/our-advantages', ['uses'=>'IndexController@ourAdvantages', 'as'=>'ourAdvantages']);
Route::get('/guarantees-of-reliability', ['uses'=>'IndexController@guaranteesReliability', 'as'=>'guaranteesReliability']);
Route::get('/full-statistics', ['uses'=>'IndexController@fullStatistics', 'as'=>'fullStatistics']);
Route::get('/reviews', ['uses'=>'ReviewController@index', 'as'=>'reviews']);
Route::get('/contact', ['uses'=>'IndexController@contact','as'=>'contact']);
Route::post('/contact', ['uses'=>'IndexController@contactSend','as'=>'contact']);


/**
 * Payment Check
 */
Route::post('pay/notification', ['uses'=>'PayController@payCheck']);
Route::get('pay/success', ['uses'=>'PayController@paySuccess']);
Route::get('pay/error', ['uses'=>'PayController@payError']);


/*
 * Auth Routes
 */
Auth::routes();
Route::get('login/{provider}', 'Auth\LoginController@redirectToProvider')->name('socialLogin');
Route::get('login/{provider}/callback', 'Auth\LoginController@handleProviderCallback');
Route::get('forecaster/{id}', 'ForecasterController@index')->name('forecaster');

/**
 * Parser News
 */
Route::get('/news-parser/{token}', 'Admin\NewsController@parserNews');


/*
 * User Routes
 */
Route::group(['middleware'=>'auth'], function(){
    Route::get('/profile', 'UserController@home')->name('home');
    Route::post('/forecast/buy', 'PayController@buy')->name('forecast.buy');
    Route::post('/subscription/buy', 'PayController@buySubscription')->name('subscription.buy');
    Route::post('/reviews', ['uses'=>'ReviewController@addReview', 'as'=>'addReview']);
});



/*
 * Admin Routes
 */
Route::group(['prefix'=>'control-panel', 'middleware'=>['auth','admin']], function(){
    Route::get('/', ['uses'=>'Admin\AdminController@index', 'as'=>'control-panel']);

    Route::resource('/forecasts', 'Admin\ForecastsController')->except(['show']);
    Route::post('/forecasts/update-result/{id}', 'Admin\ForecastsController@updateResult')->name('forecasts.updateResult');
    Route::get('/forecasts/change-status/{id}/{status}', 'Admin\ForecastsController@changeStatus')->name('forecasts.changeStatus');
    Route::get('/forecasts/change-paid/{id}/{paid}', 'Admin\ForecastsController@changePaid')->name('forecasts.changePaid');
    Route::resource('/sort', 'Admin\SortController')->except(['create', 'show']);
    Route::post('/sorts/get', 'Admin\SortController@getSorts');

    Route::resource('/news', 'Admin\NewsController');
    Route::resource('/news-category', 'Admin\NewsCategoryController');

    Route::resource('/users', 'Admin\UsersController');
    Route::post('/users/add-user', 'Admin\UsersController@addUser');
    Route::post('/users/update-user', 'Admin\UsersController@updateUser');
    Route::post('/users/get-user', 'Admin\UsersController@getUser');

    Route::get('/forecasters', 'Admin\ForecastersController@index')->name('forecasters.index');

    Route::resource('/reviews', 'Admin\ReviewsController');
    Route::post('/reviews/confirm', ['uses'=>'Admin\ReviewsController@confirm', 'as'=>'reviews.confirm']);
});