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
Route::get('/supplier-meetings','SupplierMeetingController@index')->middleware(['supplier']);
Route::get('/supplier-meetings-view/{id}','SupplierMeetingItemController@openFile')->middleware(['supplier']);
Route::get('/required-token','SupplierMeetingController@login');
Route::post('/required-token','SupplierMeetingController@checkLogin');
Route::get('/logout-token','SupplierMeetingController@logout');
// Route::get('/product','ProductController@index');
// Route::get('/product/grp/{group_name}','ProductController@index');
Route::get('/customer','CustomerController@index');
Route::get('/news-activities','NewsActivitieController@index');
Route::get('/news-activities/read/{id}','NewsActivitieController@read');
Route::get('/news-activities/announcement','NewsActivitieController@index');
Route::get('/news-activities/event','NewsActivitieController@index');
Route::get('/news-activities/article','NewsActivitieController@index');
Route::get('/internship-program','InternshipProgramController@show');

Route::get('/contact-information','ContactUsController@index');
Route::get('/join-us/{all}','JoinUsJobController@index');
Route::get('/join-us-read/{id}','JoinUsJobController@read');
Route::post('/join-us-register','JoinUsJobController@register');
Route::get('/card/{name}','JoinUsRegisController@viewCard')->middleware(['auth']);
Route::get('/one-stop-service','OneStopServiceController@show');

Route::get('/admin',function(){ return redirect('/webadmin'); });
Route::get('/administration',function(){ return redirect('/webadmin'); });
Route::get('/home', 'HomeController@index')->name('home');

Route::post('/send-vote','VoteItemController@store');
Route::get('/query-score','VoteController@show');

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
    Route::get('/about-us-ajax','AboutUsController@ajaxQuery');
    Route::get('/about-us-item-ajax/{about_us_id}','AboutUsItemController@ajaxQuery');
    
    Route::get('/customer','CustomerController@show');
    Route::get('/customer/create','CustomerController@create');
    Route::post('/customer/create','CustomerController@store');
    Route::get('/customer/edit/{id}','CustomerController@edit');
    Route::post('/customer/edit/{id}','CustomerController@update');
    Route::get('/customer/delete/{id}','CustomerController@destroy');
    Route::get('/customer/update-status/{id}/{status}','CustomerController@updateStatus');
    Route::get('/customer-ajax','CustomerController@ajaxQuery');

    Route::get('/news-activities','NewsActivitieController@show');
    Route::get('/news-activities/create','NewsActivitieController@create');
    Route::post('/news-activities/create','NewsActivitieController@store');
    Route::get('/news-activities/edit/{id}','NewsActivitieController@edit');
    Route::post('/news-activities/edit/{id}','NewsActivitieController@update');
    Route::get('/news-activities/delete/{id}','NewsActivitieController@destroy');
    Route::get('/news-activities/update-status/{id}/{status}','NewsActivitieController@updateStatus');
    Route::get('/news-activities-ajax','NewsActivitieController@ajaxQuery');
    Route::post('/news-activities/uploadTmp','NewsActivitieController@uploadTmp');
    Route::get('/news-activities/getTmp','NewsActivitieController@getTmp');
    Route::post('/news-activities/addHeader','NewsActivitieController@addHeader');
    Route::post('/news-activities/addGallery','NewsActivitieController@addGallery');
    Route::post('/news-activities/removeGallery','NewsActivitieController@removeGallery');
    

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
    Route::get('/our-service-ajax','OurServiceController@ajaxQuery');

    Route::get('/our-service/item/{our_service_id}','OurServiceItemController@show');
    Route::get('/our-service/createitem/{our_service_id}','OurServiceItemController@create');
    Route::post('/our-service/createitem/{our_service_id}','OurServiceItemController@store');
    Route::get('/our-service/edititem/{id}','OurServiceItemController@edit');
    Route::post('/our-service/edititem/{id}','OurServiceItemController@update');
    Route::get('/our-service/deleteitem/{id}','OurServiceItemController@destroy');
    Route::get('/our-service/item-update-status/{id}/{status}','OurServiceItemController@itemUpdateStatus');
    Route::get('/our-service-item-ajax/{our_service_id}','OurServiceItemController@ajaxQuery');

    Route::get('/supplier-meeting','SupplierMeetingItemController@index');
    Route::get('/supplier-meeting/create','SupplierMeetingItemController@create');
    Route::post('/supplier-meeting/create','SupplierMeetingItemController@store');
    Route::get('/supplier-meeting/edit/{id}','SupplierMeetingItemController@edit');
    Route::post('/supplier-meeting/edit/{id}','SupplierMeetingItemController@update');
    Route::get('/supplier-meeting/delete/{id}','SupplierMeetingItemController@destroy');
    Route::get('/supplier-meeting/update-status/{id}/{status}','SupplierMeetingItemController@updateStatus');
    Route::get('/supplier-meeting-item-ajax','SupplierMeetingItemController@ajaxQuery');

    Route::get('/supplier-meeting/account','SupplierMeetingController@account');
    Route::get('/supplier-meeting/account-update-status/{id}/{status}','SupplierMeetingController@updateStatus');
    Route::get('/supplier-meeting/account-delete/{id}','SupplierMeetingController@destroy');
    Route::get('/supplier-meeting/account-edit','SupplierMeetingController@update');
    Route::get('/supplier-meeting/account-create','SupplierMeetingController@store');
    Route::get('/supplier-meeting-ajax','SupplierMeetingController@ajaxQuery');
    
    Route::get('/facebookPlugin','FacebookMessagePluginController@show');
    Route::post('/facebookPlugin','FacebookMessagePluginController@update');
    Route::get('/facebookPlugin/status/{status_name}','FacebookMessagePluginController@updateStatus');

    Route::get('/administration','UserController@index');
    Route::get('/administration/create','UserController@create');
    Route::post('/administration/store','UserController@store');
    Route::get('/administration/update-status/{id}/{status}','UserController@updateStatus');
    Route::get('/administration/delete/{id}','UserController@destroy');
    Route::get('/administration/reset/{id}','UserController@resetPassword');
    Route::get('/administration-ajax','UserController@ajaxQuery');

    Route::get('/hotIssue','HotIssueController@index');
    Route::post('/hotIssue/create','HotIssueController@store');
    Route::get('/hotIssue/update-status','HotIssueController@updateStatus');
    Route::get('/hotIssue-ajax','HotIssueController@ajaxQuery');

    Route::get('/pupup','PopupController@index');
    Route::post('/pupup/create','PopupController@store');
    Route::get('/pupup/update-status','PopupController@updateStatus');
    Route::get('/pupup-ajax','PopupController@ajaxQuery');

    Route::get('/slideShow','SlideShowController@index');
    Route::post('/slideShow/create','SlideShowController@store');
    Route::get('/slideShow/update-status','SlideShowController@updateStatus');
    Route::get('/slideShow-ajax','SlideShowController@ajaxQuery');
    
    Route::get('/join-us','JoinUsJobController@index');
    Route::post('/join-us/create','JoinUsJobController@store');
    Route::get('/join-us/edit/{id}','JoinUsJobController@edit');
    Route::post('/join-us/edit/{id}','JoinUsJobController@update');
    Route::get('/join-us/update-status/{id}/{status}','JoinUsJobController@updateStatus');
    Route::get('/join-us/delete/{id}','JoinUsJobController@destroy');
    Route::get('/join-us-is-join/{id}','JoinUsJobController@viewRegister');
    Route::get('/join-us-ajax','JoinUsJobController@ajaxQuery');
    Route::get('/join-us-is-join-ajax/{id}','JoinUsRegisController@ajaxQuery');

    Route::get('/related-link','RelatedLinkController@index');
    Route::get('/related-link/create','RelatedLinkController@create');
    Route::post('/related-link/create','RelatedLinkController@store');
    Route::get('/related-link/edit/{id}','RelatedLinkController@edit');
    Route::post('/related-link/edit/{id}','RelatedLinkController@update');
    Route::get('/related-link/update-status/{id}/{status}','RelatedLinkController@updateStatus');
    Route::get('/related-link/delete/{id}','RelatedLinkController@destroy');
    Route::get('/related-link-ajax','RelatedLinkController@ajaxQuery');

    // Route::get('/product','ProductController@show');
    // Route::get('/product/createitem','ProductController@create');
    // Route::post('/product/createitem','ProductController@store');
    // Route::get('/product/edititem/{id}','ProductController@edit');
    // Route::post('/product/edititem/{id}','ProductController@update');
    // Route::get('/product/deleteitem/{id}','ProductController@destroy');
    // Route::get('/product/item-update-status/{id}/{status}','ProductController@itemUpdateStatus');

    Route::get('/vote','VoteController@index');
    Route::post('/vote/create','VoteController@store');

    Route::get('/one-stop-service','OneStopServiceController@index');
    Route::post('/one-stop-service/update','OneStopServiceController@update');

    Route::get('/internship-program','InternshipProgramController@index');
    Route::post('/internship-program/update','InternshipProgramController@update');

    Route::get('/history','AboutUsItemController@showHistoryOnly');
    Route::get('/history/createitem/{about_us_id}','AboutUsItemController@create2');
    Route::post('/history/createitem/{about_us_id}','AboutUsItemController@store');
    Route::get('/history/edititem/{id}','AboutUsItemController@edit2');
    Route::post('/history/edititem/{id}','AboutUsItemController@update');
    Route::get('/history/deleteitem/{id}','AboutUsItemController@destroy');
    Route::get('/history/item-update-status/{id}/{status}','AboutUsItemController@itemUpdateStatus');

    Route::get('/system-configuration','SystemConfigurationController@index');
    Route::get('/system-configuration/edit','SystemConfigurationController@edit');
    Route::post('/system-configuration/edit','SystemConfigurationController@update');
});