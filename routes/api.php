<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/** search route */
Route::group(['namespace' => 'API'], function () {

    Route::get('cities-categories', 'SearchServicesController@cities_categories');
    Route::get('/search', 'SearchServicesController@search');
    Route::get('/search/filter', 'SearchServicesController@filter_search');
    Route::get('/auto/search', 'SearchServicesController@auto_search');
    Route::get('homepage/events', 'SearchServicesController@events_banner');
    Route::get('search/top_trend', 'SearchServicesController@select_trend');
});

/** HomePageController Routes */
Route::group(['namespace' => 'API'], function () {

    Route::get('/homePage/venue-services', 'HomePageController@venues_services');
    Route::get('/homePage/catering-services', 'HomePageController@catering_services');
    Route::get('/homePage/category-subcategory', 'HomePageController@category_subcategory');
    Route::get('homepage/slider-bar', 'HomePageController@slider_bar');
    Route::get('homepage/nav-bar', 'HomePageController@nav_bar');
    Route::get('homepage/blogs', 'HomePageController@blog');
    Route::get('homepage/discover_by_city', 'HomePageController@discover_neighborhood');
});

/** CustomerUserController Routes */
Route::group(['namespace' => 'API'], function () {

    Route::post('login', 'CustomerUserController@login')->middleware('CheckVerify');
    Route::post('register', 'CustomerUserController@register');
    Route::post('verify', 'CustomerUserController@verify');
    Route::post('ChangePassword', 'CustomerUserController@changePassword')->middleware('auth:api');

    Route::post('CustomerData', 'CustomerUserController@UpdateCustomerData')->middleware('auth:api');
    Route::post('changeEmail', 'CustomerUserController@changeUserEmail')->middleware('auth:api');
    Route::get('CustomerData', 'CustomerUserController@CustomerData')->middleware('auth:api');

    Route::post('ContactUs', 'CustomerUserController@contact_us');
});

/** ServiceController Routes */
Route::group(['namespace' => 'API'], function () {

    Route::get('service/recent_views', 'ServiceController@get_recent_view_services');
    Route::get('service/{service_id}', 'ServiceController@get_service_details');
    Route::get('related_service/{service_id}', 'ServiceController@get_related_service');
    Route::get('service_price', 'ServiceController@get_service_price');
});



/** ReservationsController Routes */
Route::group(['middleware' => 'auth:api', 'namespace' => 'API'], function () {

    Route::get('reservations', 'ReservationsController@get_reservations_list');
    Route::post('reservation/service', 'ReservationsController@reservation_service');
    Route::put('reservation/update/{reservation_id}', 'ReservationsController@update_reservation');
    Route::delete('reservation/remove/{reservation_id}', 'ReservationsController@remove_reservation');
    Route::delete('reservation/remove_addons', 'ReservationsController@remove_reservation_addons');
});

/** wishList Routes */
Route::group(['middleware' => 'auth:api', 'namespace' => 'API'], function () {

    Route::post('wishList', 'ServiceController@add_service_to_wishList'); //add
    Route::get('wishList', 'ServiceController@get_service_from_wishList'); //get
    Route::delete('wishList/{service_id}', 'ServiceController@delete_service_from_wishList'); //remove

});

/** event route */
Route::group(['namespace' => 'API'], function () {

    Route::get('/events/filter', 'EventServicesController@filter_events');
    Route::get('/events/{id}', 'EventServicesController@get_events');
});


/** faq route */
Route::group(['namespace' => 'API'], function () {

    Route::get('faq', 'FaqController@index');
    Route::get('ask_category', 'FaqController@get_ask_category');
});
