<?php

use App\Instagram;
use Carbon\Carbon;
use Illuminate\Http\Request;

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

Route::get('/instagram', function () {

    if (Cache::has('instagram_feed')) {
        return Cache::get('instagram_feed');
    }
    $instagram = new Instagram('7100986431.1677ed0.8396640aab294bdaae07b570e91c5c95');

    $timeout = Carbon::now()->addDay();
    $feed = json_encode($instagram->get());
    Cache::put('instagram_feed', $feed, $timeout);

    return $feed;
});