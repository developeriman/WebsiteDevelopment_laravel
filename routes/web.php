<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;

use App\Http\Controllers\{
    HomeController 
};


use App\Http\Controllers\Backend\{
    UserController, 
    ProfileController,
    LogoController,
    SliderController,
    MissionController,
    VisionController,
    NewsEventController,
    ServiceController,
    ContactController,
    AboutController,

};
use App\Http\Controllers\Frontend\{
    FrontendController, 
};




Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group(['middleware'=>'test'],function(){
    Route::resource('users', UserController::class);
    Route::resource('profiles', ProfileController::class);
});

Route::get('/password/view', [ProfileController::class, 'passwordView'])->name('profiles.password.view');
Route::post('/password/update', [ProfileController::class, 'passwordUpdate'])->name('profiles.password.update');

//Route for FrontendController ; 
Route::get('/', [FrontendController::class, 'index']);
Route::get('/about-us', [FrontendController::class, 'AboutUs'])->name('about.us');
Route::get('/contact-us', [FrontendController::class, 'ContactUs'])->name('contact.us');

//Route for logo Controller 

  Route::resource('logos', LogoController::class);

  //Route for slider controller 
  Route::resource('sliders', SliderController::class);
  //Route for mission Controller 
    Route::resource('missions', MissionController::class);

      //Route for vision Controller 
    Route::resource('visions', VisionController::class);

    
      //Route for NewsEvent Controller ServiceController
    Route::resource('news_events', NewsEventController::class);
    Route::resource('services', ServiceController::class);
    Route::resource('contacts', ContactController::class);
    Route::resource('abouts', AboutController::class);



    



    
    // Route::get('/logtest',function(){

    //   $message ="This is test log message"; 
    //   Log::info($message);
    //   return 'Log message generated'; 
    // });

    // Route::get('/logtest',function(){

    //   $message ="This is test log message"; 
    //   Log::channel('message')->info($message);
    //   return 'Log message generated'; 
    // });

    Route::get('/two-step-verification',function(Request $request){
          $username =$request->get('username');
          $mobile =$request->get('mobile');

          if($username =='user' && $mobile =='01401'){
            $code =uniqid();
            Log::channel('message')->info('Your two step verification code is'. $code);
          }
          else{
            return "Username or mobile number wrong"; 
          }
    });



