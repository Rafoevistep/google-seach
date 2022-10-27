<?php

use App\Http\Controllers\Api_v1\SearchController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/',function (){
    return redirect('/en');
});

Route::get('/{lang}', function ($lang) {
    App::setLocale($lang);
    return view('welcome');
});


