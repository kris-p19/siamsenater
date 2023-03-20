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
Auth::routes();
Route::get('/', function () {
    return view('welcome');
});
Route::get('/lang/{locale}', function ($locale) {
    App::setLocale($locale);
    session()->put('locale', $locale);
    return redirect()->back();
});
foreach (DB::table('about_us')->get() as $key => $item) {
    Route::get($item->path,'AboutUsController@index');
}
Route::get('/our-service','OurServiceController@index');
Route::get('/our-service/read/{id}','OurServiceController@read');
Route::get('/customer','CustomerController@index');
Route::get('/news-activities','NewsActivitieController@index');
Route::get('/news-activities/read/{id}','NewsActivitieController@read');
Route::get('/contact-us','ContactUsController@index');

Route::get('/admin',function(){ return redirect('/webadmin'); });
Route::get('/administration',function(){ return redirect('/webadmin'); });
Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix'=>'webadmin','middleware'=>['auth']],function(){
    Route::get('/','HomeController@index');

    Route::get('/about-us','AboutUsController@show');
    Route::get('/about-us/create','AboutUsController@create');
    Route::post('/about-us/create','AboutUsController@store');
    Route::get('/about-us/edit/{id}','AboutUsController@edit');
    Route::post('/about-us/edit/{id}','AboutUsController@update');
    Route::get('/about-us/delete/{id}','AboutUsController@destroy');
    Route::get('/about-us/update-status/{id}/{status}','AboutUsController@updateStatus');
    Route::get('/about-us/item/{about_us_id}','AboutUsItemController@show');
    Route::get('/about-us/createitem/{about_us_id}','AboutUsItemController@create');
    Route::post('/about-us/createitem/{about_us_id}','AboutUsItemController@store');
    Route::get('/about-us/edititem/{id}','AboutUsItemController@edit');
    Route::post('/about-us/edititem/{id}','AboutUsItemController@update');
    Route::get('/about-us/deleteitem/{id}','AboutUsItemController@destroy');
    Route::get('/about-us/item-update-status/{id}/{status}','AboutUsItemController@itemUpdateStatus');
    
    Route::get('/customer','CustomerController@show');
    Route::get('/customer/create','CustomerController@create');
    Route::post('/customer/create','CustomerController@store');
    Route::get('/customer/edit/{id}','CustomerController@edit');
    Route::post('/customer/edit/{id}','CustomerController@update');
    Route::get('/customer/delete/{id}','CustomerController@destroy');
    Route::get('/customer/update-status/{id}/{status}','CustomerController@updateStatus');

    Route::get('/news-activities','NewsActivitieController@show');
    Route::get('/news-activities/create','NewsActivitieController@create');
    Route::post('/news-activities/create','NewsActivitieController@store');
    Route::get('/news-activities/edit/{id}','NewsActivitieController@edit');
    Route::post('/news-activities/edit/{id}','NewsActivitieController@update');
    Route::get('/news-activities/delete/{id}','NewsActivitieController@destroy');
    Route::get('/news-activities/update-status/{id}/{status}','NewsActivitieController@updateStatus');

    Route::get('/contact-us','ContactUsController@show');
    Route::get('/contact-us/edit/{id}','ContactUsController@edit');
    Route::post('/contact-us/edit/{id}','ContactUsController@update');

    Route::get('/our-service','OurServiceController@show');
    Route::get('/our-service/create','OurServiceController@create');
    Route::post('/our-service/create','OurServiceController@store');
    Route::get('/our-service/edit/{id}','OurServiceController@edit');
    Route::post('/our-service/edit/{id}','OurServiceController@update');
    Route::get('/our-service/delete/{id}','OurServiceController@destroy');
    Route::get('/our-service/update-status/{id}/{status}','OurServiceController@updateStatus');
    Route::get('/our-service/item/{our_service_id}','OurServiceItemController@show');
    Route::get('/our-service/createitem/{our_service_id}','OurServiceItemController@create');
    Route::post('/our-service/createitem/{our_service_id}','OurServiceItemController@store');
    Route::get('/our-service/edititem/{id}','OurServiceItemController@edit');
    Route::post('/our-service/edititem/{id}','OurServiceItemController@update');
    Route::get('/our-service/deleteitem/{id}','OurServiceItemController@destroy');
    Route::get('/our-service/item-update-status/{id}/{status}','OurServiceItemController@itemUpdateStatus');

    Route::get('/facebookPlugin','FacebookMessagePluginController@show');
    Route::post('/facebookPlugin','FacebookMessagePluginController@update');
    Route::get('/facebookPlugin/status/{status_name}','FacebookMessagePluginController@updateStatus');

    Route::get('/administration','UserController@index');
    Route::get('/administration/create','UserController@create');
    Route::post('/administration/store','UserController@store');
    Route::get('/administration/update-status/{id}/{status}','UserController@updateStatus');
    Route::get('/administration/delete/{id}','UserController@destroy');
    Route::get('/administration/reset/{id}','UserController@resetPassword');

    Route::get('/hotIssue','HotIssueController@index');
    Route::post('/hotIssue/create','HotIssueController@store');
    Route::get('/hotIssue/update-status','HotIssueController@updateStatus');

    Route::get('/pupup','PopupController@index');
    Route::post('/pupup/create','PopupController@store');
    Route::get('/pupup/update-status','PopupController@updateStatus');

    Route::get('/slideShow','SlideShowController@index');
    Route::post('/slideShow/create','SlideShowController@store');
    Route::get('/slideShow/update-status','SlideShowController@updateStatus');
    
});