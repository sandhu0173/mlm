<?php

use Illuminate\Support\Facades\Route;



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
    //return view('welcome');
    
    return redirect('login');
});

Auth::routes();
Route::impersonate();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/getsponsor', [App\Http\Controllers\Auth\RegisterController::class, 'getsponsor'])->name('getsponsor');

Route::group(['middleware' => ['auth', 'member'],'prefix'=>'member'], function() {
     Route::get('/', [App\Http\Controllers\MemberController::class, 'index'])->name('member');
     Route::get('/dashboard', [App\Http\Controllers\MemberController::class, 'index'])->name('member');
     Route::get('/kyc', [App\Http\Controllers\KycController::class, 'index'])->name('member.kyc');
     Route::post('/kyc', [App\Http\Controllers\KycController::class, 'store'])->name('member.kyc.store');
     Route::post('/kyc/{id}/update', [App\Http\Controllers\KycController::class, 'update'])->name('member.kyc.update');
     Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('member.profile');
     
     Route::post('/profile/update', [App\Http\Controllers\ProfileController::class, 'update'])->name('member.profile.update');
     Route::post('change-password', [App\Http\Controllers\ProfileController::class, 'changepassword'])->name('member.change-password');
     Route::resource('orders', App\Http\Controllers\OrderController::class);
     Route::get('order/product', [App\Http\Controllers\OrderController::class,'product']);
     Route::get('order/invoice/{id}', [App\Http\Controllers\OrderController::class,'invoice']);
     Route::get('order/package', [App\Http\Controllers\OrderController::class,'package']);

    Route::get('genealogy', [App\Http\Controllers\GenealogyController::class, 'show']);
   
    Route::get('genealogy/{id}', [App\Http\Controllers\GenealogyController::class, 'tree']);
    Route::get('reports', [App\Http\Controllers\ReportController::class, 'payout']);
    Route::post('report/detail/{id}', [App\Http\Controllers\ReportController::class, 'detail']);
});

Route::group(['middleware' => ['auth', 'admin'],'prefix'=>'admin'], function() {
    Route::get('/', [App\Http\Controllers\AdminController::class, 'index'])->name('admin');
    Route::get('/dashboard', [App\Http\Controllers\AdminController::class, 'index'])->name('admin');
    Route::resource('categories', App\Http\Controllers\Admin\CategoryController::class);
    Route::resource('gst-type', App\Http\Controllers\Admin\GstmasterController::class);
    Route::resource('products', App\Http\Controllers\Admin\ProductController::class);
    Route::resource('packages', App\Http\Controllers\Admin\PackageController::class);
    Route::get('packages/{id}/change-status', [App\Http\Controllers\Admin\PackageController::class, 'chagestatus']);

    Route::resource('genealogy', App\Http\Controllers\Admin\GenealogyController::class);
    Route::get('genealogy/show/{id}', [App\Http\Controllers\Admin\GenealogyController::class, 'tree']);
    Route::post('genealogy/search', [App\Http\Controllers\Admin\GenealogyController::class, 'search']);

    Route::resource('orders', App\Http\Controllers\Admin\OrdersController::class);
    Route::get('orders/{id}/approve', [App\Http\Controllers\Admin\OrdersController::class, 'approve']);
    Route::get('orders/{id}/reject', [App\Http\Controllers\Admin\OrdersController::class, 'reject']);
    Route::get('order/invoice/{id}', [App\Http\Controllers\Admin\OrdersController::class, 'invoice']);


    Route::resource('kycs', App\Http\Controllers\Admin\KycsController::class);
    Route::post('kycs/approve/{id}', [App\Http\Controllers\Admin\KycsController::class, 'approve']);
    Route::post('kycs/reject/{id}', [App\Http\Controllers\Admin\KycsController::class, 'reject']);


    Route::resource('members', App\Http\Controllers\Admin\MemberController::class);
    Route::match(['get','post'],'members/{id}/change-password', [App\Http\Controllers\Admin\MemberController::class, 'changepassword']);
    Route::match(['get','post'],'member/orders/{id}', [App\Http\Controllers\Admin\MemberController::class, 'orders']);
    Route::get('member/invoice/{id}', [App\Http\Controllers\Admin\MemberController::class, 'invoices']);
    Route::post('members/{id}/block', [App\Http\Controllers\Admin\MemberController::class, 'block']);
    Route::post('members/{id}/unblock', [App\Http\Controllers\Admin\MemberController::class, 'unblock']);
    Route::post('members/{id}/impersonate', [App\Http\Controllers\Admin\MemberController::class, 'impersonate']);
    Route::get('member/logout', [App\Http\Controllers\Admin\MemberController::class, 'stopImpersonate']);
    
    

    Route::resource('payouts', App\Http\Controllers\Admin\PayoutController::class);
    Route::post('payouts/member/pay/{id}', [App\Http\Controllers\Admin\PayoutController::class, 'memberpay']);
    Route::post('payouts/member/pay/store/{id}', [App\Http\Controllers\Admin\PayoutController::class, 'memberpaystore']);
    Route::get('payouts/member/pay/{id}', [App\Http\Controllers\Admin\PayoutController::class, 'memberpaid']);


    Route::match(['get','post'],'websetting/change-logo', [App\Http\Controllers\Admin\SettingController::class, 'changelogo']);
    Route::match(['get','post'],'websetting/contact-info', [App\Http\Controllers\Admin\SettingController::class, 'contactinfo']);
    Route::match(['get','post'],'websetting/general-settings', [App\Http\Controllers\Admin\SettingController::class, 'generalsettings']);

});
