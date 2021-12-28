<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\GoodsController;
use App\Http\Controllers\memberController;


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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('add',[GoodsController::class,"addData"]);
Route::post('addconfirm/{id}',[GoodsController::class,"addGoods"]); //working

Route::post('add_member',[memberController::class,"addMember"]);
Route::post('signin',[memberController::class,"memberSignin"]);
Route::get('goods',[GoodsController::class,"showData"]);
Route::get('goodslist',[GoodsController::class,"showGoods"]);

Route::get('detail/{id}',[GoodsController::class,"showpending"]);
Route::get('edit/{id}',[GoodsController::class,"showEdit"]);
Route::put('update/{id}',[GoodsController::class,"updatepending"]);
Route::put('updateconfirm/{id}',[GoodsController::class,"updateGoods"]);

Route::put('yesvote/{id}',[GoodsController::class,"updateyes"]);
Route::put('novote/{id}',[GoodsController::class,"updateno"]);

Route::delete('delete/{id}',[GoodsController::class,"delete"]);

