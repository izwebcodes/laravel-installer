<?php

use App\Systemsetting;

Route::get('/', function () {

    try {
        if (Systemsetting::count()) {
            return view('welcome');
        } else {
            return view('registerApp');
        }
    } catch (Exception $e) {
        return view('installApp');
    }
});

Route::get('app/systemInt', function () {
    sleep(4);
    try {
        Artisan::call('migrate');
    } catch (Exception $x) {
        return 2;
    }
    try {
        dd(DB::table('users')->count());
    } catch (Exception $xx) {
        return 1;
    }
})->name('app.systemInt');
