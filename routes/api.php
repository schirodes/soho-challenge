<?php

use App\Http\Controllers\CDestacados;
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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::prefix("destacados")->group(function(){
    Route::post("/save", [CDestacados::class, 'save']);
    Route::get("/all", [CDestacados::class, "getAll"]);
    Route::delete("/delete", [CDestacados::class, "delete"]);
});