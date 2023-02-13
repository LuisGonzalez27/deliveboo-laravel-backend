<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\RestaurantController;
use App\Http\Controllers\Api\PlateController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('restaurants', [RestaurantController::class, 'index']);
Route::get('restaurants/{slug}', [RestaurantController::class,'show']);
Route::get('types', [RestaurantController::class, 'types']);
Route::get('categories', [RestaurantController::class, 'categories']);
Route::get('plates', [PlateController::class, 'index']);
Route::get('plates/{slug}', [PlateController::class, 'show']);
Route::get('filter', [RestaurantController::class, 'filterRestaurants']);