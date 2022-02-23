<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;

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




Route::get("/user/register","Frontend\AuthController@user_registration")->name("sign-up");
Route::post("/place/order","Frontend\InstrumentOrderController@store")->name("place-order");

Route::group(['namespace'=>'Frontend'],function(){


    Route::get('/','FrontendController@index')->name('homepage');
    Route::get('about','FrontendController@about')->name('about');
    Route::get('services','FrontendController@service')->name('service');
    Route::get('project','FrontendController@project')->name('project');
    Route::get('privacy-policy','FrontendController@privacy_policy')->name('privacy.policy');


    /*for agency jobs*/

    Route::get('find/district','FrontendController@finddistrict')->name('finddistrict');

    Route::get('agency/jobs','FrontendController@agency_jobs')->name('agency.jobs');
    Route::get('agency/jobs/detail/{id}','FrontendController@agency_jobs_detail')->name('agency.jobs.detail');
    Route::post('artist/job/apply','FrontendController@artistjobapply')->name('artist.jobs.apply');


    /*Artists search*/
    Route::get('artist','FrontendController@artist')->name('artist');
    Route::get('artist-search','FrontendController@artist_search')->name('artist.search');

    Route::get('artist/profile/{local}/{id}','FrontendController@artist_profile')->name('artist.profile');
    Route::get('artist/gallery/{id}','FrontendController@artist_gallery')->name('artist.gallery');
    Route::get('artist/booking/{id}','FrontendController@artist_booking')->name('artist.booking');
    Route::post('artist/booking/post','FrontendController@artist_booking_post')->name('artist.booking.post');
    Route::get('artist-profile/work/{id}','FrontendController@artist_profile_work')->name('artist.profile.work');
    Route::get('artist-profile/contact/{id}','FrontendController@artist_profile_contact')->name('artist.profile.contact');

    //subscribe
    Route::post('subscribe','FrontendController@subscribePost')->name('subscribe');
    // BLOG
    Route::get('blog','FrontendController@blog')->name('blog');
    Route::get('blog/weekly','FrontendController@blogWeelky')->name('blog.weekly');
    Route::get('blog/daily','FrontendController@blogDaily')->name('blog.daily');
    Route::get('blog/details/{slug}','FrontendController@blogDetails')->name('blog.details');
    Route::get('blog/category/{slug}','FrontendController@blogCategory')->name('blog.category');



 

    Route::get('business','FrontendController@business')->name('business');
    Route::get('contact','FrontendController@contact')->name('contact');
    Route::post('contact','FrontendController@contact_post')->name('contact.post');
    Route::get('international','FrontendController@international')->name('international');


    

    /* ================= product shopping cart  ==================================*/

    Route::get('instruments','FrontendController@instruments')->name('musincal.instruments');
    Route::get('instrument/details/{slug}','FrontendController@instument_details')->name('instrument.details');


    Route::post('instrument/add_to_cart', 'ShoppingCartController@store')->name('instrument.add_to_cart');
    Route::post('instrument/addtocart', 'ShoppingCartController@storesingle')->name('instrument.single.cart');
    Route::post('instrument/cart_update', 'ShoppingCartController@update');
    Route::get('cart', 'ShoppingCartController@shoppingcart');
    Route::post('instrument/cart/item/destroy/', 'ShoppingCartController@destroy')->name('instrument.cart.destroy');


    /* ================= for vendor  ==================================*/
    Route::get('vendor-instruments/{id}','FrontendController@vendorInstrument')->name('vendor.instrument');
    Route::get('vendor-profile/{id}','FrontendController@vendorProfile')->name('vendor.instrument.profile');

    //for ajax call

    Route::get('/instrument/shopping/cart/count/ajax','ShoppingCartController@showcartcount')->name('instrument.cart.count.ajax');

    Route::get('/instrument/carttable/ajax','ShoppingCartController@showcarttable')->name('instrument.cartable.ajax');
    Route::get('/instrument/cartsummery/ajax','ShoppingCartController@showcartsummery')->name('instrument.cartsummery.ajax');
    Route::post('/instrument/incrementCart','ShoppingCartController@update')->name('instrument.incrementCart');
    Route::post('/instrument/decrementCart','ShoppingCartController@decrementCart')->name('instrument.decrementCart');
    Route::post('/instrument/remove_cart','ShoppingCartController@remove_cart')->name('instrument.remove_cart');

    Route::get('instruments/cart','ShoppingCartController@instrumentscart')->name('instruments.cart.list');
    Route::get('instrument/billing','ShoppingCartController@instrumentbilling')->name('instrument.billing');


    /* ============== for order ==================================================== */
    Route::post('order/store', 'OrderController@store');




    Route::get('tickets','FrontendController@ticket_pack')->name('ticket.pack');



    Route::get('ticket/addtocart/{id}','ShoppingCartController@ticketaddtocart')->name('ticket.addtocart');
    Route::get('tickets-checkout','ShoppingCartController@ticketscart')->name('tickets.checkout');

    Route::get('/ticket/carttable/ajax','ShoppingCartController@ticketshowcarttable')->name('ticket.cartable.ajax');
    Route::get('/ticket/cartsummery/ajax','ShoppingCartController@ticketshowcartsummery')->name('ticket.cartsummery.ajax');
    Route::get('tickets/billing','ShoppingCartController@ticketsbilling')->name('ticket.checkout.final');


    Route::post('/ticket/order','TicketOrderController@store')->name('ticket.store');



    /* ============================================== User Registration =====================================================*/

    Route::get('login','AuthController@login')->name('login');
    Route::post('user/login','AuthController@userlogin')->name('user.login');


    Route::get('registration','AuthController@user_registration')->name('registration');
    Route::post('registration/store','AuthController@registration_store')->name('registration.store');


    Route::get('artist-registration','AuthController@artist_registration')->name('artist.registration');
    Route::post('artist-registration-post','AuthController@artist_registration_post')->name('artist.registration.post');


    Route::get('agency-registration','AuthController@agencyRegistration')->name('agency.registration');
    Route::post('agency-registration-post','AuthController@agency_registration_post')->name('agency.registration.post');


    Route::get('vendor-registration','AuthController@vendorRegistration')->name('vendor.registration');
    Route::post('vendor-registration-post','AuthController@vendor_registration_post')->name('vendor.registration.post');

    /* ============================================= End User Registration ==================================================*/




});






//For admin





Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});





















