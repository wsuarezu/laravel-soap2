<?php

use App\Http\Controllers\ClienteController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MySoapController;
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
    return view('welcome');
});

Route::name('my_soap_server.wsdl')->get('/soap.wsdl', [MySoapController::class, 'wsdlProvider']);

Route::name('my_soap_server')->post('/soap', [MySoapController::class, 'soapServer']);

Route::get("/cliente", [ClienteController::class, "index"]);