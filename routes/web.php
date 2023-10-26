<?php

use App\Http\Controllers\Backend\BannerController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\EditProfieController;
use App\Http\Controllers\Backend\IntroduceController;
use App\Http\Controllers\Backend\LoginController;
use App\Http\Controllers\Backend\OrderController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\TrademarkController;
use App\Http\Controllers\Frontend\AddCartController;
use App\Http\Controllers\Frontend\AuthController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\LoginController as FrontendLoginController;
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

Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('dang-ki', [FrontendLoginController::class, 'userRegister'])->name('userRegister');
Route::post('dang-ki', [AuthController::class, 'register'])->name('register');
Route::get('dang-nhap', [FrontendLoginController::class, 'showLoginUser'])->name('user.showlogin');
Route::post('dang-nhap', [AuthController::class, 'loginUser'])->name('user.login');
Route::get('dang-xuat', [AuthController::class, 'logout'])->name('logout');
Route::get('thong-tin-tai-khoan', [AuthController::class, 'profile'])->name('profile');
Route::get('thong-tin-tai-khoan/dia-chi', [AuthController::class, 'profileAddress'])->name('profileAddress');


Route::get('/san-pham',[HomeController::class, 'showAllProduct'])->name('ProductList'); 
Route::get('/san-pham-{name}',[HomeController::class, 'showAllProductWith'])->name('showAllProductWith'); 
Route::get('/san-pham/{id}-{slug}', [HomeController::class, 'productDetail'])->name('productDetail');


Route::post('/them', [AddCartController::class, 'addCartajax'])->name('addCartajax');
Route::post('/them-san-pham', [AddCartController::class, 'addcart'])->name('addcart');


Route::get('/gio-hang',[AddCartController::class , 'showCartList'])->name('showCartList');
Route::get('/xoa-gio-hang-{rowId}',[AddCartController::class , 'deleteCart'])->name('deleteCart');


Route::get('/thanh-toan',[AddCartController::class , 'pay'])->name('pay');
Route::post('/thanh-toan',[AddCartController::class , 'sendOrder'])->name('sendRequest');

Route::get('/gioi-thieu',[HomeController::class, 'aboutUs'])->name('about-us');

Route::get('/lien-he',[HomeController::class, 'Contact'])->name('Contact'); 
Route::post('/lien-he',[HomeController::class, 'addContact'])->name('addContact'); 

Route::get('/tin-tuc',[HomeController::class, 'blog'])->name('blog');
Route::get('/tin-tuc/{id}-{slug}',[HomeController::class, 'blog_details'])->name('blog_details');

Route::post('',[HomeController::class , 'sendEmail'])->name('sendEmail');

Route::get('/sanpham/tim-kiem',[HomeController::class, 'search'])->name('search'); 
Route::get('/san-pham/loc',[HomeController::class, 'filterAjax'])->name('loc');






//ADMIN

Route::get('admin/login', [LoginController::class, 'showLogin'])->name('admin.showlogin');
Route::get('admin', [LoginController::class, 'showLogin'])->name('admin.showlogin');
// đăng nhập 
Route::post('admin/login', [LoginController::class, 'login'])->name('admin.login');
// Đăng xuất trang quản lí
Route::get('/admin/logout', [LoginController::class, 'logout'])->name('admin.logout');

Route::prefix('admin')->middleware('auth')->group(function() {
    Route::get('/', [LoginController::class, 'showHome'])->name('admin.home');

    // Danh mục 
    Route::prefix('category')->group(function () {
        // hiển thị danh sách danh mục
        Route::get('/', [CategoryController::class, 'listCategory'])->name('admin.category');
        // thêm danh mục
        Route::get('create', [CategoryController::class, 'createCategory'])->name('admin.createCategory');
        Route::post('create', [CategoryController::class, 'post'])->name('admin.postCategory');
        // chỉnh sửa danh mục
        Route::get('update-{id}', [CategoryController::class, 'getUpdateCategory'])->name('admin.getUpdateCategory');
        Route::post('update-{id}', [CategoryController::class, 'updateCategory'])->name('admin.updateCategory');
        // xóa danh mục
        Route::get('delete-{id}', [CategoryController::class, 'deleteCategory'])->name('admin.deleteCategory');
        // tìm kiếm danh mục
        Route::get('search', [CategoryController::class, 'search'])->name('admin.category.search');
    });

    //Banner
    Route::prefix('banner')->group(function () {
        // hiển thị danh sách 
        Route::get('/', [BannerController::class, 'view_Banner'])->name('admin.Banner');
        // thêm 
        Route::get('create', [BannerController::class, 'createBanner'])->name('banner.create');
        Route::post('create', [BannerController::class, 'post'])->name('banner.postCreate');
        // chỉnh sửa 
        Route::get('update-{id}', [BannerController::class, 'get_update_Banner'])->name('banner.getUpdate');
        Route::post('update-{id}', [BannerController::class, 'update_Banner'])->name('banner.postUpdate');
        // xóa 
        Route::get('delete-{id}', [BannerController::class, 'deleteBanner'])->name('admin.deleteBanner');
    });

    //Product
    Route::prefix('product')->group(function () {
        // danh sách sản phẩm
        Route::get('list', [ProductController::class, 'showProductList'])->name('admin.showProductList');
        //search
        Route::get('search', [ProductController::class, 'search'])->name('admin.product.search');
        // thêm
        Route::get('create', [ProductController::class, 'createProduct'])->name('admin.getCreateProduct');
        Route::post('create', [ProductController::class, 'post'])->name('admin.addProduct');
        // sửa
        Route::get('list/update/{id}', [ProductController::class, 'getUpdateProduct'])->name('admin.getUpdateProduct');
        Route::post('list/update/{id}', [ProductController::class, 'updateProduct'])->name('admin.updateProduct');
        // xóa
        Route::get('list/delete/{id}', [ProductController::class, 'deleteProduct'])->name('admin.deleteProduct');
        Route::get('search', [ProductController::class, 'search'])->name('admin.product.search');
    });

    Route::prefix('order')->group(function() {
        //show list order
        Route::get('/get', [OrderController::class, 'showListOrder'])->name('showListOrder');
        // show detail order
        Route::get('/details-{id}', [OrderController::class, 'showDetailsOrder'])->name('showDetailsOrder');
        Route::post('update-{id}', [OrderController::class, 'updateStatus'])->name('updateStatus');
        Route::get('delete-{id}', [OrderController::class, 'deleteOrder'])->name('deleteOrder');
    });


    Route::prefix('blog')->group(function () {
        // hiển thị blog
        Route::get('/', [App\Http\Controllers\Backend\BlogController::class, 'BlogList'])->name('blog.list');
        // thêm blog
        Route::get('create', [App\Http\Controllers\Backend\BlogController::class, 'createBlog'])->name('blog.create');
        Route::post('create', [App\Http\Controllers\Backend\BlogController::class, 'storeBlog']);
        // chỉnh sửa blog
        Route::get('update/{id}', [App\Http\Controllers\Backend\BlogController::class, 'getUpdateBlog'])->name('blog.getUpdate');
        Route::post('update/{id}', [App\Http\Controllers\Backend\BlogController::class, 'updateBlog'])->name('blog.update');
        // xóa blog
        Route::get('deleteblog/{id}', [App\Http\Controllers\Backend\BlogController::class, 'deleteBlog'])->name('admin.deleteblog');
    });

    Route::prefix('trademark')->group(function () {
        // hiển thị danh sách 
        Route::get('/', [TrademarkController::class, 'view_Trademark'])->name('admin.Trademark');
        // thêm 
        Route::get('create', [TrademarkController::class, 'createTrademark'])->name('trademark.create');
        Route::post('create', [TrademarkController::class, 'post']);
        // chỉnh sửa 
        Route::get('update-{id}', [TrademarkController::class, 'get_update_Trademark'])->name('trademark.getUpdate');
        Route::post('update-{id}', [TrademarkController::class, 'update_Trademark'])->name('trademark.postUpdate');
        // xóa 
        Route::get('delete-{id}', [TrademarkController::class, 'deleteTrademark'])->name('admin.deleteTrademark');
    });

    Route::prefix('introduce')->group(function() {
        Route::get('update',[IntroduceController::class,'getUpdateIntroduce'])->name('get.intro');
        Route::post('update',[IntroduceController::class,'updateIntroduce'])->name('updateIntroduce');
    });

    Route::prefix('register_news')->group(function() {
        Route::get('/get', [ProductController::class, 'showEmail'])->name('showEmail');
        Route::get('delete-{id}', [ProductController::class, 'deleteEmail'])->name('deleteEmail');
    });


    Route::prefix('editing')->group(function () {
        Route::get('update', [EditProfieController::class, 'getEdit'])->name('admin.getEditProfile');
        Route::post('update', [EditProfieController::class, 'updateProfile'])->name('admin.getEditProfile');
    });

});

