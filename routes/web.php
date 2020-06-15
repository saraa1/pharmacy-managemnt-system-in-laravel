<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
//Route::group(['prefix' => 'admin'], function () {
//    Voyager::routes();
//});

Route::get('/', function () {

    $inventory=\App\Inventory::paginate(6);
    $comment=\App\Comments::all();


    return view('index',compact('inventory','comment'));
});

Auth::routes();





Route::get('/home', 'HomeController@index');
//
Route::get('/admin',function(){

    return view('admin.index');
});


Route::get('/customer',function(){

    return 'customer';
});


Route::get('/search','MedicineController@search');
Route::group(['middleware'=>['auth']],function(){

        Route::resource('/staff','StaffController',['names'=>[
            'edit'=>'staff.edit',
            'index'=>'staff.index',
            'show'=>'staff.show']]);


            Route::get('/add_to_cart/{med}','CartController@add_to_cart');
            Route::get('/cart/index','CartController@index');
            Route::delete('/cart/delete/{id}','CartController@destroy');
            Route::patch('/cart/update/{id}','CartController@update');

            Route::get('/checkout','CartController@checkout');




    Route::resource('/medicine','MedicineController',['names'=>[
        'create'=>'medicine.create',
        'index'=>'medicine.index',
        'show'=>'medicine.show']]);
    Route::resource('/comments','CommentController',['names'=>[

        'index'=>'comments.index',
        'edit'=>'comments.edit',

        ]]);

    Route::get('/available_inventory', 'InventoryController@available_inventory');
    Route::get('/sold_inventory', 'InventoryController@sold_inventory');

    Route::resource('/comments','CommentController',['names'=>[
        'index'=>'comments.index',
        'show'=>'comments.show'

    ]]);

    Route::resource('/comment/replies','CommentReplyController',['names'=>[
        'index'=>'comment.replies.index',
        'show'=>'comment.replies.show',

    ]]);


    Route::resource('/order','OrderController',['names'=>[

        'create'=>'order.create',
        'index'=>'order.index',
        'show'=>'order.show',
        'edit'=>'order.edit',
        ]]);
    Route::resource('/inventory','InventoryController',['names'=>[
        'index'=>'inventory.index',
        'show'=>'inventory.show',
        'edit'=>'inventory.edit',

    ]]);

});


//Route::delete('/order/delete/{id}','OrderController@destroy')->name('order.delete');

Route::get('/logout', 'Auth\LoginController@logout');


//
//
//Route::group(['prefix' => 'admin'], function () {
//    Voyager::routes();
//});
