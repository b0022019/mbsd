<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebCrawlerController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });


// Route::get('/', 'WebCrawlerController@index');
// Route::post('/crawl', 'WebCrawlerController@crawl')->name('crawl');


Route::get('/', [WebCrawlerController::class, 'index']);

Route::post('/crawl', [WebCrawlerController::class, 'crawl'])
->name('crawl');

