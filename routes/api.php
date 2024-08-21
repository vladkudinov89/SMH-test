<?php

use App\Http\Controllers\Parse\ParseController;
use App\Http\Controllers\Product\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::group([
    'namespace' => 'Dummy'
], function ($api) {
    $api->get('/parse_dummy', [ParseController::class, 'parseDummy']);
});

Route::group([
    'namespace' => 'Product'
], function ($api) {
    $api->post('/add_product', [ProductController::class, 'addProduct']);
});
