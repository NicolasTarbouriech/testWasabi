<?php

use App\Http\Controllers\indexController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\URL;

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

Route::get('/', function () {
    return view('index');
});

// route pour envoyer le fichier de mon PC sur le wasabi storage
Route::get('/sendFile', [indexController::class, 'sendFileWasabiStorage']);

// route pour le lien url de téléchargement
Route::get('/downloadurl', [indexController::class, 'downloadUrlFile']);

// route pour le téléchargement direct du fichier 
Route::get('/download', [indexController::class, 'downloadFile']);
