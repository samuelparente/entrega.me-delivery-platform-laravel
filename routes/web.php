<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\MessengerController;
use App\Http\Controllers\CompanyController;

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


//Homepage
Route::get('/',[MainController::class,'home']);

//Login page
Route::get('/auth/login',[MainController::class,'login'])->name('login');

//Let's login!
Route::post('/auth/login',[MainController::class,'submitLogin'])->name('login.submit');

//Logout
Route::post('/auth/logout',[MainController::class,'submitLogout'])->name('logout');

//Register page
Route::get('/auth/register',[MainController::class,'register'])->name('register');

//Register processing
Route::post('/auth/registeruser',[MainController::class,'registerUser'])->name('registeruser');;

//Be a parner page
Route::get('/company',[MainController::class,'bePartner'])->name('bepartner');

//Be a messenger page
Route::get('/messenger',[MainController::class,'beMessenger'])->name('bemessenger');

//Contacts page
Route::get('/contacts',[MainController::class,'contacts'])->name('contacts');

//Protected routes
//All this routes user must be logged in
Route::middleware(['auth'])->group(function () {

    //Test page
    Route::get('/tests',[MainController::class,'tests']);

    //Client dashboard
    Route::get('/client/dashboard', [MainController::class, 'clientDashboard'])->name('client.dashboard');

    //Company dashboard
    Route::get('/company/dashboard', [CompanyController::class, 'companyDashboard'])->name('company.dashboard');

    //Company profile
    Route::get('/company/profile', [CompanyController::class, 'companyProfile'])->name('company.profile');

    //Company catalog
    Route::get('/company/catalog', [CompanyController::class, 'companyCatalog'])->name('company.catalog');

    //Show product
    Route::get('/company/showproduct/{id}',[CompanyController::class,'showproduct']);

    //Edit product page
    Route::get('/company/updateproduct/{id}',[CompanyController::class,'updateproduct']);

    //Edit products fields
    Route::post('/company/edit_product/{id}',[CompanyController::class,'edit_product']);

    //Create product page
    Route::get('/company/createproduct',[CompanyController::class,'createproduct']);

    //Create the product itself
    Route::post('/company/add_product',[CompanyController::class,'add_product']);

    //Delete product page
    Route::get('/company/deleteproduct/{id}',[CompanyController::class,'destroy']);

    //Post catalog for product Delete
    //Route::post('/company/catalog/{id}', [CompanyController::class, 'destroy'])->name('destroy');
    //Destroy product
    //Route::post('/company/product_delete/{id}', [CompanyController::class,'destroy']);


    //Company orders
    Route::get('/company/orders', [CompanyController::class, 'companyOrders'])->name('company.orders');

    //Company Profile update
    Route::post('/editprofile', [MainController::class, 'updateProfile'])->name('company.profile');

    //Messenger dashboard
    Route::get('/messenger/dashboard', [MainController::class, 'messengerDashboard'])->name('messenger.dashboard');

});
