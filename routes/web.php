<?php

use Illuminate\Support\Facades\Route;

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

// Twilio Integration
Route::prefix('video-session')->middleware('auth')->group(function() {
//Route::prefix('twilio/room')->group(function() {
   Route::get('join/{roomName}', 'twilioController@joinRoom')->name('tw.session.join');
   Route::get('create/{roomName}', 'twilioController@createRoom')->name('tw.session.create');
});
    
    Route::get('twilio', "twilioController@index")->name('twilio.index');
    //Route::get('/messages', 'MessageController@index')->name('messages.index');
    //Route::get('/messages/{ids}', 'MessageController@chat')->name('messages.chat');
    Route::get('privacy-policies', function () {
        return view('legal-pages.privacy-policies');
    });


    Route::get('all-packages', function () {
        return view('all-packages.packages-wrapper');
    });

    Route::get('faq', function () {
        return view('faq');
    });

    //Route::get('checkout', function () {
        //return view('checkout.checkout-wrapper');
    //});

    Route::get('checkout', 'CheckoutController@index')->name('checkout.index');
    Route::post('checkout/store', 'CheckoutController@store')->name('checkout.store');

    Route::get('contact-us', function () {
        return view('contactus');
    });

    Route::get('about-us', function () {
        return view('aboutus');
    });

Route::get('profile', 'PayoutController@getProfile');
Route::get('payout/{id}', 'PayoutController@Payout')->name('payout.send');

Route::get('payout-demo', 'PayoutController@index')->name('payout.index');
Route::get('payout-demo/create', 'PayoutController@create')->name('payout.create');
Route::post('payout-demo/store', 'PayoutController@store')->name('payout.store');


Auth::routes();
//Route::get('/chat', 'ChatsController@index');
//Route::get('messages', 'ChatsController@fetchMessages');
//Route::post('messages', 'ChatsController@sendMessage');

Route::namespace('Frontweb')->group(function () {

    Route::get('/','WelcomeController@index')->name('home');
    Route::middleware('auth')->get('/home','WelcomeController@index');

    Route::get('package-details/{id}', "WelcomeController@singlePackage")->name('home.singlePackage');

    Route::middleware('auth')->get('{bookingType}/subject/{subjectId}', 'BookingController@bookingIndex')->name('booking.index');
    Route::middleware('auth')->post('{bookingType}/subject/{subjectId}/add', 'BookingController@addBooking')->name('booking.store');

    Route::middleware('auth')->get('/dashboard', 'DashboardController@Index')->name('profile.dashboard');


    Route::prefix('coach')->group(function () {
        Route::get('list-all','TeachersController@index')->name('teachers.show.all');
        Route::get('/profile/{id}','TeacherProfileController@show')->name('teacher.profile.show');
        Route::get('/settings', 'TeacherProfileController@ContactSettings')->name('teacher.settings.index');
        Route::put('/settings', 'TeacherProfileController@ContactSettingsUpdate')->name('teacher.settings.update');
        Route::get('/profile-settings', 'TeacherProfileController@ProfileSettings')->name('teacher.profile.settings');
        Route::post('/profile-settings', 'TeacherProfileController@ProfileSettingsUpdate')->name('teacher.profile.update');
        
        Route::get('/get-paid', 'TeacherProfileController@getpaidSettings')->name('teacher.profile.getpaid');
        Route::post('/get-paid', 'TeacherProfileController@getpaidUpdate')->name('teacher.profile.getpaidUpdate');

        /*Route::get('/reports', function () {
        return view('coach-dashboard.reports');
        })->name('teacher.profile.reports');

        Route::get('/get-paid', function () {
        return view('coach-profile-settings.get-paid');
        })->name('teacher.profile.getpaid');*/

        Route::get('/security', function () {
        return view('coach-profile-settings.security');
        })->name('teacher.profile.security');
        Route::put('/security', 'TeacherProfileController@updatePass')->name('teacher.profile.securityUpdate');

        Route::middleware('auth')->put('booking/{id}/re-schedule', 'BookingController@updateBooking')->name('booking.update');
        Route::middleware('auth')->get('booking/{id}/cancel', 'BookingController@cancelBooking')->name('booking.cancel');

        /*Route::get('/dashboard', function () {
        return view('coach-dashboard.dashboard');
        })->name('teacher.profile.dashboard');*/
        Route::middleware('auth')->get('/my-bookings', 'DashboardController@coachBookings')->name('teacher.profile.bookings');
        Route::middleware('auth')->get('/my-students', 'DashboardController@coachStudentsList')->name('teacher.profile.coachees');
        Route::middleware('auth')->get('/reports', 'DashboardController@coachReports')->name('teacher.profile.reports');
        //Route::get('/my-sessions', 'TeacherProfileController@vsess')->name('teacher.profile.sessions');

        Route::prefix('services')->group(function() {
            Route::get('/','ServicesController@index')->name('teacher.services.index');
            Route::post('/rates', 'ServicesController@ratesStore')->name('teacher.rates.store');
            Route::post('/packages', 'ServicesController@packageStore')->name('teacher.packages.store');
            Route::get('/services/{id}','ServicesController@index')->name('teacher.services.show');
            Route::put('/service/{id}', 'ServicesController@serviceUpdate')->name('teacher.service.update');
            //Route::put('/packages/{id}', 'ServicesController@packageUpdate')->name('teacher.packages.update');
        });
    });


     Route::prefix('coachee')->group(function () {

        Route::get('/settings', 'StudentProfileController@ContactSettings')->name('student.settings.index');
        Route::put('/settings', 'StudentProfileController@ContactSettingsUpdate')->name('student.settings.update');

        Route::get('/profile-settings', 'StudentProfileController@ProfileSettings')->name('student.profile.settings');
        Route::post('/profile-settings', 'StudentProfileController@ProfileUpdate')->name('student.profile.update');
        
        //Route::get('/qa-settings', 'StudentProfileController@QASettings')->name('student.profile.qa-settings');
        //Route::post('/qa-settings', 'StudentProfileController@QAUpdate')->name('student.profile.qaUpdate');


        /*Route::get('/reports', function () {
        return view('student-dashboard.reports');
        })->name('student.profile.reports');*/

        Route::get('/security', function () {
        return view('student-profile-settings.security');
        })->name('student.profile.security');
        Route::put('/security', 'StudentProfileController@updatePass')->name('student.profile.securityUpdate');
        /*Route::get('/dashboard', function () {
        return view('student-dashboard.dashboard');
        })->name('student.profile.dashboard');*/
        Route::middleware('auth')->get('/my-bookings', 'DashboardController@studentBookings')->name('student.profile.bookings');
        Route::middleware('auth')->get('/my-coaches', 'DashboardController@studentCoachesList')->name('student.profile.coaches');
        Route::middleware('auth')->get('/reports', 'DashboardController@studentReports')->name('student.profile.reports');


    });

});