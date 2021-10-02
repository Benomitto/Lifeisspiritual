<?php

use Illuminate\Support\Facades\Route;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Controllers\MpesaController;
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

//Index

Route::get('/videos', function () {return view('videos');});
Route::get('/gallery', function () {return view('gallery');});


//Ecommerce Dashboard
//Route::get('/dashboard', 'App\Http\Controllers\PagesController@dashboard')->name('dashboard');

Route::get('/orders', 'App\Http\Controllers\PagesController@orders')->name('orders');
//Controller
Route::get('/contactus', 'App\Http\Controllers\PagesController@contactus')->name('contactus');
Route::post('/contactus', function(){$data = request(['name','phone','email','message']);
\Illuminate\Support\Facades\Mail::to('benjaminomitto@gmail.com')->send(new \App\Mail\LifeIsSpiritual($data));
return redirect('/contactus')->with('flash','Message Sent Successfully');});

//Account activation
Route::get('/activate/{code}', 'App\Http\Controllers\ActivateAccountController@activation')->name('user.active');
Route::get('/resend/{code}', 'App\Http\Controllers\ActivateAccountController@resendCode')->name('code.resend');

//Admin Section

Route::group(['middleware' => ['auth','admin']],function(){ Route::get('/admin', function () {return view('admin.index');});});
Route::get('/admin', [App\Http\Controllers\AdminController::class, 'dashboard'])->name('admin.dashboard');
Route::get('/admin/products', 'App\Http\Controllers\AdminController@getProducts')->name('admin.products');
Route::get('/admin/orders', 'App\Http\Controllers\AdminController@getOrders')->name('admin.orders');


//Controllers
//Welcome
Route::get('/', [App\Http\Controllers\WelcomeController::class, 'index'])->name('welcome');
Route::get('/admin/welcome', 'App\Http\Controllers\WelcomeController@getWelcome')->name('admin.welcome');
//Route::get('/admin/welcome','App\Http\Controllers\WelcomeController@store')->name('admin.welcome');
Route::post('/admin/welcome','App\Http\Controllers\WelcomeController@store');
Route::get('welcome.update/{id}','App\Http\Controllers\WelcomeController@edit');
Route::put('welcome.update/{id}','App\Http\Controllers\WelcomeController@update');

Route::resource('/welcome','App\Http\Controllers\WelcomeController');


//About
Route::get('/about/', [App\Http\Controllers\AboutController::class, 'about'])->name('about');
Route::get('/admin/about', 'App\Http\Controllers\AboutController@getAbout')->name('admin.about');
Route::resource('/about','App\Http\Controllers\AboutController');

//Blog
Route::get('/blog/', [App\Http\Controllers\BlogController::class, 'index'])->name('blog');
Route::get('/admin/blog', 'App\Http\Controllers\BlogController@getBlog')->name('admin.blog');
Route::resource('/blog','App\Http\Controllers\BlogController');

//Ourbooks
Route::get('/ourbooks', [App\Http\Controllers\OurbooksController::class, 'ourbooks'])->name('ourbooks');
Route::get('/category/products/{category}', 'App\Http\Controllers\OurbooksController@getCategoryProducts')->name('category.products');
Route::resource('/products','App\Http\Controllers\ProductController');
Route::resource('/orders','App\Http\Controllers\OrderController');
//master
//Route::get('/blog/', [App\Http\Controllers\BlogController::class, 'index'])->name('blog');
//Route::get('/admin/blog', 'App\Http\Controllers\BlogController@getBlog')->name('admin.blog');
//Route::resource('/blog','App\Http\Controllers\BlogController');
//Cart
Route::get('/cart', 'App\Http\Controllers\CartController@index')->name('cart.index');
Route::post('/add/cart/{product}', 'App\Http\Controllers\CartController@addProductToCart')->name('add.cart');
Route::put('/update/cart/{product}', 'App\Http\Controllers\CartController@updateProductOnCart')->name('update.cart');
Route::delete('/delete/cart/{product}', 'App\Http\Controllers\CartController@removeProductFromCart')->name('delete.cart');

//Mpesa Checkout
Route::get('/checkout', 'App\Http\Controllers\CheckoutController@index')->name('checkout');

//Confirmation Message
Route::get('/confirm', function () {return view('confirm');});
Route::post('payment/confirmation', [MpesaController::class, 'confirmPayment'])->name('confirm.payment');

//Payments
Route::get('/payments', [App\Http\Controllers\OurbooksController::class, 'payments'])->name('payments');


//Transactions
Route::get('/transactions', [App\Http\Controllers\OurbooksController::class, 'transactions'])->name('transactions');


Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('welcome');