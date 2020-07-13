<?php

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('admin/store-vendor','Admin\SellerController@storeVendor');
Route::get('admin/sellers-list','Admin\SellerController@sellersList');
Route::get('admin/seller-details/{id}','Admin\SellerController@sellerDetails');

Route::post('admin/store-seller','Admin\SellerRequestController@storeSellerRequest');


Route::get('/admin/get-categories','Admin\ProductController@getCategories');
Route::get('/seller/categories-child/{id}','Admin\ProductController@getCatChild');

Route::post('/seller/store-product','Admin\ProductController@storeProduct');
Route::post('/seller/store-product-images','Admin\ProductController@storeProductImages');

Route::post('/seller/store-variation','VariationController@storeVariation');
Route::get('/seller/get-product-variations/{id}','VariationController@getProductVariations');
Route::get('/seller/delete-variation/{id}','VariationController@deleteVariation');
Route::post('/seller/store-option','VariationController@storeOption');
Route::post('/seller/store-option-images','VariationController@storeOptionsImages');




