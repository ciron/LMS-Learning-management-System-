<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CourseController;
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

Auth::routes();
// Route::get('/', [HomeController::class, 'welcome'])->name('welcome');
Route::get('admins', [LoginController::class, 'showAdminLoginForm'])->name('adminloginpage');

Route::get('/admin/register', [RegisterController::class,'showAdminRegisterForm']);


Route::post('/login/admin', [LoginController::class,'adminLogin'])->name('adminlogin');

Route::post('/register/admin', [RegisterController::class,'createAdmin'])->name('adminregister');

Route::group(['middleware' => 'auth:admin'], function () {

    Route::get('/admin/home',[AdminController::class,'index'])->name('admindashboard');
    Route::get('admin/logout',[AdminController::class,'logout'])->name('adminlogout');
    Route::get('/allUser',[AdminController::class,'allUser'])->name('allregisteruser');
    Route::get('admin/allRegisterUsers',[AdminController::class,'registeruser'])->name('registeruser');
    Route::post('admin/banuser/{id}',[AdminController::class,'banuser'])->name('banuser');
    Route::get('userFetchList', [AdminController::class,'userFetchList']);
    Route::get('/active_deactive_user/{id}', [AdminController::class,'active_deactive_user']);
    // Route::get('category/indexing', [CategoryController::class,'indexing'])->name('categoryindex');
    // Route::get('/index',[CategoryController::class,'index'])->name('allCat');
    // Route::resource('ajaxproducts','ProductAjaxController');
    // Route::resource('ajaxproducts', CategoryController::class);
    // Route::get('ajax-crud-datatable', [CategoryController::class, 'index']);
    // Route::post('store-company', [CategoryController::class, 'store']);
    // Route::post('edit-company', [CategoryController::class, 'edit']);
    // Route::post('delete-company', [CategoryController::class, 'destroy']);
    Route::resource('contacts', CategoryController::class);
    Route::get('admin/getall', [CategoryController::class, 'getall'])->name('getall.contacts');
    Route::resource('courses', CourseController::class);
    Route::get('/Allcourse',[CourseController::class,'index'])->name('allcourses');
    // Route::get('Allcourse/create',[CourseController::class,'create'])->name('courses.create');
    Route::get('admin/getallCourse', [CourseController::class, 'getallCourse'])->name('getall.course');



});

Route::get('logout', [LoginController::class,'userlogout'])->name('userlogout');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
