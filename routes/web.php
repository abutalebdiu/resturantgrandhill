<?php

use App\Http\Controllers\Admin\BookingController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\Admin\PropertyController;
use App\Http\Controllers\Frontend\FrontendController;

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

Route::get('/clear', function () {
    $exitCode = Artisan::call('config:clear');
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('config:cache');
    return 'DONE';
});






Auth::routes();

Route::get("/user/register", "Frontend\AuthController@user_registration")->name("sign-up");


Route::group(['namespace' => 'Frontend'], function () {


    Route::get('/', 'FrontendController@index')->name('homepage');
    Route::get('about', 'FrontendController@about')->name('about');
    Route::get('room', 'FrontendController@room')->name('room');
    Route::get('gallery', 'FrontendController@gallery')->name('gallery');
    Route::get('offer', 'FrontendController@offer')->name('offer');
    Route::get('contact', 'FrontendController@contact')->name('contact');
    Route::post('contact/post', 'FrontendController@contactPost')->name('fronted.contact.post');

    Route::get('trems-and-conditions', 'FrontendController@tremsCondition')->name('trems.condition');


    Route::get('search', 'FrontendController@search')->name('search');


    ///////////////////////////// Start of Search Portion //////////////////
    Route::post('/search', [PropertyController::class, 'search'])->name('searching');





    //subscribe
    Route::post('subscribe', 'FrontendController@subscribePost')->name('frontend.subscribe');

    // BLOG
    Route::get('blog', 'FrontendController@blog')->name('blog');
    Route::get('blog/details/{slug}', 'FrontendController@blogDetails')->name('blog.details');


    Route::get('contact', 'FrontendController@contact')->name('contact');
    Route::post('contact', 'FrontendController@contact_post')->name('contact.post');
    Route::get('room/booking/{id}', 'FrontendController@RoomBooking')->name('room.booking');
    Route::post('room/booking/post', 'FrontendController@RoomBookingPost')->name('room.booking.post');

    Route::get('room/booking', 'FrontendController@RoomBookingIndex')->name('room.booking.index');
    Route::post('booking/status/{id}', 'FrontendController@bookingStatus')->name('change.update');

    Route::get('booking/delete/{id}', 'FrontendController@bookingdelete')->name('room.booking.delete');





    /* ============================================== User Registration =====================================================*/

    Route::get('login', 'AuthController@login')->name('login');
    Route::post('user/login', 'AuthController@userlogin')->name('user.login');

    Route::get('registration', 'AuthController@user_registration')->name('registration');
    Route::post('registration/store', 'AuthController@registration_store')->name('registration.store');

    Route::get('forgot/password', 'AuthController@forgotpassword')->name('password.forgot.get');

    /* ============================================= End User Registration ==================================================*/
});

/*End for frontend*/


/*Start for Backend Admin*/

Route::group(['namespace' => 'Admin', 'middleware' => ['auth', 'admin']], function () {

    Route::get('admin-dashboard', 'DashboardController@index')->name('admin.dashboard');
    Route::resource('admin-blog', 'BlogController');
    Route::resource('blog-category', 'BlogCategoryController');
    Route::group(['as' => 'admin.', 'prefix' => 'admin'], function () {
        
        Route::resource('role', 'RoleController');
        Route::resource('gallery', 'GalleryController');
        Route::resource('room', 'RoomController');
        Route::resource('category', 'CategoryController');
        Route::resource('roomfloors', 'RoomFloorController');
        Route::resource('booking', 'BookingController');
        //room + food invoice
        Route::get('userinvoice/{id}', 'BookingController@finalInvoice')->name('final.invoice');
        Route::resource('food-category', 'FoodCategoryController');
        Route::resource('food', 'FoodController');
        Route::resource('foodorder', 'FoodOrderController');
        //Pay Food Order Bill
        Route::get('payfoodbill/{id}', 'FoodOrderController@payfoodbill')->name('payfoodbill');
        Route::post('payfoodbill/{id}', 'FoodOrderController@foodbillstore')->name('foodbillstore');
        Route::post('foodorder-adduser', 'FoodOrderController@addUser')->name('foodorder.adduser');
        Route::get('/foodorder-invoice/{id}', 'FoodOrderController@invoive')->name('foodorder.invoice');
        //Get Food Price
        Route::get('/food-details', 'FoodOrderController@getFoodDetails')->name('food.details');
        Route::post('/add-to-cart', 'FoodOrderController@addCart')->name('food.cart');
        Route::get('/delete-cart/{id}', 'FoodOrderController@delCart')->name('delete.cart');
        Route::get('/increment-qty/{id}', 'FoodOrderController@incrementCart')->name('increment.cart');
        Route::get('/decrement-qty/{id}', 'FoodOrderController@decrementCart')->name('decrement.cart');



        Route::resource('bookingdetails', 'BookingDetailsController')->only('destroy', 'index');
        Route::resource('carts', 'CartController')->only('store', 'index', 'destroy');
        Route::resource('print', 'PrintController')->only('show');
        Route::get('changetype/{id}', [BookingController::class, 'changetype'])->name('chnagetype.update');
        Route::get('bookingcancle/{id}', [BookingController::class, 'bookingcancle'])->name('bookingcancle');
        Route::post('addpayment/', [BookingController::class, 'addpayment'])->name('addpayment');
        Route::resource('expenses', 'ExpenseController')->only('index', 'store', 'edit', 'update', 'destroy');
        Route::resource('funds_withdraws', 'FundWithdrawController')->only('index', 'store', 'edit', 'update', 'destroy');
        Route::resource('reports', 'ReportController');
    });

    Route::group(['as' => 'admin.', 'namespace' => 'Website', 'prefix' => 'admin'], function () {

        /* for profile setting */
        Route::get('/profile', 'ProfileController@index')->name('user.profile');
        Route::get('/profile/edit', 'ProfileController@edit')->name('user.profile.edit');
        Route::post('/profile/update', 'ProfileController@update')->name('user.profile.update');
        Route::get('/setting', 'ProfileController@setting')->name('user.setting');
        Route::post('/setting/update', 'ProfileController@changepassword')->name('user.setting.update');

        Route::get('/users', 'UserController@users')->name('users');
        Route::get('/subscribe', 'UserController@adminSubscribe')->name('subscribe');

        Route::get('website/setting/index', 'WebSettingController@index')->name('website.setting.index');
        Route::get('website/setting/create', 'WebSettingController@create')->name('website.setting.create');
        Route::post('website/setting/store', 'WebSettingController@store')->name('website.setting.store');
        Route::get('website/setting/show/{id}', 'WebSettingController@show')->name('website.setting.show');
        Route::get('website/setting/edit/', 'WebSettingController@edit')->name('website.setting.edit');
        Route::post('website/setting/update', 'WebSettingController@update')->name('website.setting.update');
        Route::get('website/setting/destroy/{id}', 'WebSettingController@destroy')->name('website.setting.destroy');

        Route::get('website/slider/index', 'SliderController@index')->name('slider.index');
        Route::get('website/slider/create', 'SliderController@create')->name('slider.create');
        Route::post('website/slider/store', 'SliderController@store')->name('slider.store');
        Route::get('website/slider/show/{id}', 'SliderController@show')->name('slider.show');
        Route::get('website/slider/edit/', 'SliderController@edit')->name('slider.edit');
        Route::post('website/slider/update', 'SliderController@update')->name('slider.update');
        Route::get('website/slider/destroy/{id}', 'SliderController@destroy')->name('slider.destroy');

        Route::resource('contact', 'ContactController');
    });

    Route::group(['as' => 'admin.', 'prefix' => 'admin'], function () {
        Route::get('/admin', 'UserController@admin')->name('admin');
        Route::post('/update-role', 'UserController@updateRole')->name('updaterole');
        Route::get('/create', 'UserController@adminCreate')->name('create');
        Route::post('/create/post', 'UserController@adminCreatePost')->name('create.post');
        Route::get('/delete/{id}', 'UserController@adminDelete')->name('delete');
    });
});
/*End for Admin*/
