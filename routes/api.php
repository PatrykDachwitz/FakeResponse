<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get("/v17/customers/{id}/googleAds:searchStream", \App\Http\Controllers\GoogleFakeResponse::class);
Route::get("/v20.0/act_{id}/insights", \App\Http\Controllers\FacebookFakeResponse::class);
Route::get("/v1beta/properties/{id}:runReport", \App\Http\Controllers\AnalyticsFakeResponse::class);
Route::get("/shop/sales", \App\Http\Controllers\ShopFakeResponse::class);
