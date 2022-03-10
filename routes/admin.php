<?php

use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\Category\CategoryController;
use App\Http\Controllers\Admin\Customers\CustomersController;
use App\Http\Controllers\Admin\GeneralQuestions\GeneralQuestionsController;
use App\Http\Controllers\Admin\HomeSlider\HomeSliderController;
use App\Http\Controllers\Admin\Profile\AdminProfileController;
use App\Http\Controllers\Admin\Services\AdminServiceController;
use App\Http\Controllers\Admin\SubCategory\SubCategoryController;
use App\Http\Controllers\HomeController;

use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function () {
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('admin.showLoginForm');
    Route::post('login', [LoginController::class, 'Login'])->name('admin.login');
    Route::group(['middleware' => 'auth:admin'], function () {
        Route::get('/home', [HomeController::class, 'index'])->name('admin.home');
        Route::get('/', [HomeController::class, 'index'])->name('admin.index');
        Route::post('/logout', [LoginController::class, 'logout'])->name('admin.logout');
        Route::group(['namespace' => 'Category', 'prefix' => 'category'], function () {
            Route::get('/', [CategoryController::class, 'index'])->name('admin.category.index');
            Route::get('/create', [CategoryController::class, 'create'])->name('admin.category.create');
            Route::post('/store', [CategoryController::class, 'store'])->name('admin.category.store');
            Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('admin.category.edit');
            Route::post('/update', [CategoryController::class, 'update'])->name('admin.category.update');
            Route::get('/show/{id}', [CategoryController::class, 'show'])->name('admin.category.show');
            Route::delete('/delete/', [CategoryController::class, 'delete'])->name('admin.category.delete');
        });
        Route::group(['namespace' => 'SubCategory', 'prefix' => 'sub-category'], function () {
            Route::get('/', [SubCategoryController::class, 'index'])->name('admin.sub_category.index');
            Route::get('/create', [SubCategoryController::class, 'create'])->name('admin.sub_category.create');
            Route::post('/store', [SubCategoryController::class, 'store'])->name('admin.sub_category.store');
            Route::get('/edit/{id}', [SubCategoryController::class, 'edit'])->name('admin.sub_category.edit');
            Route::post('/update', [SubCategoryController::class, 'update'])->name('admin.sub_category.update');
            Route::get('/update _images', [SubCategoryController::class, 'edit_images'])->name('admin.sub_category.edit');
            Route::post('/update_images', [SubCategoryController::class, 'update_images'])->name('admin.sub_category.update_images');
            Route::get('/show/{id}', [SubCategoryController::class, 'show'])->name('admin.sub_category.show');
            Route::delete('/delete/', [SubCategoryController::class, 'delete'])->name('admin.sub_category.delete');
        });
        Route::group(['namespace' => 'Services', 'prefix' => 'services'], function () {
            Route::get('/', [AdminServiceController::class, 'index'])->name('admin.services.index');
            Route::get('/create', [AdminServiceController::class, 'create'])->name('admin.services.create');
            Route::post('/store', [AdminServiceController::class, 'store'])->name('admin.services.store');
            Route::get('/edit/{id}', [AdminServiceController::class, 'edit'])->name('admin.services.edit');
            Route::post('/update', [AdminServiceController::class, 'update'])->name('admin.services.update');
            Route::post('additional-service/update', [AdminServiceController::class, 'updateAdditionalService'])->name('admin.services.update.additional_service');
            Route::get('/show/{id}', [AdminServiceController::class, 'show'])->name('admin.services.show');
            Route::get('/accept/{id}', [AdminServiceController::class, 'accept'])->name('admin.services.accept');
            Route::delete('/delete/', [AdminServiceController::class, 'delete'])->name('admin.services.delete');
            Route::post('/accept/', [AdminServiceController::class, 'accept'])->name('admin.services.accept');
            Route::get('admin/get-cat/{cat_id?}', [AdminServiceController::class, 'getSubCategoryBaseCategory'])->name('admin.services.getSubCategoryBaseCategory');
            Route::get('/edit/additional-service/{id}', [AdminServiceController::class, 'editAdditionalService'])->name('admin.services.edit.additional_service');
            Route::get('/delete/additional-service/{id}', [AdminServiceController::class, 'deleteAdditionalService'])->name('admin.services.delete.additional_service');
            Route::get('/create/additional-service/{service_id}', [AdminServiceController::class, 'createAdditionalService'])->name('admin.services.additional_service.create');
            Route::post('/create/additional-service', [AdminServiceController::class, 'storeAdditionalService'])->name('admin.services.additional_service.store');

        });
        Route::group(['namespace' => 'Customers', 'prefix' => 'customers'], function () {
            Route::get('/', [CustomersController::class, 'index'])->name('admin.customers.index');
            Route::get('/create', [CustomersController::class, 'create'])->name('admin.customers.create');
            Route::post('/store', [CustomersController::class, 'store'])->name('admin.customers.store');
            Route::get('/edit/{id}', [CustomersController::class, 'edit'])->name('admin.customers.edit');
            Route::post('/update', [CustomersController::class, 'update'])->name('admin.customers.update');
            Route::get('/show/{id}', [CustomersController::class, 'show'])->name('admin.customers.show');
            Route::get('/accept/{id}', [CustomersController::class, 'accept'])->name('admin.customers.accept');
            Route::delete('/delete/', [CustomersController::class, 'delete'])->name('admin.customers.delete');
            Route::post('/changes-status/', [CustomersController::class, 'ChangeStatus'])->name('admin.customers.ChangeStatus');

        });
        Route::group(['namespace' => 'GeneralQuestions', 'prefix' => 'general-questions'], function () {
            Route::get('/', [GeneralQuestionsController::class, 'index'])->name('admin.general_questions.index');
            Route::get('/create', [GeneralQuestionsController::class, 'create'])->name('admin.general_questions.create');
            Route::post('/store', [GeneralQuestionsController::class, 'store'])->name('admin.general_questions.store');
            Route::get('/edit/{id}', [GeneralQuestionsController::class, 'edit'])->name('admin.general_questions.edit');
            Route::post('/update', [GeneralQuestionsController::class, 'update'])->name('admin.general_questions.update');
            Route::get('/show/{id}', [GeneralQuestionsController::class, 'show'])->name('admin.general_questions.show');
            Route::delete('/delete/', [GeneralQuestionsController::class, 'delete'])->name('admin.general_questions.delete');

        });
        Route::group(['namespace' => 'HomeSlider', 'prefix' => 'home-slider'], function () {
            Route::get('/', [HomeSliderController::class, 'index'])->name('admin.home_slider.index');
            Route::get('/create', [HomeSliderController::class, 'create'])->name('admin.home_slider.create');
            Route::post('/store', [HomeSliderController::class, 'store'])->name('admin.home_slider.store');
            Route::get('/edit/{id}', [HomeSliderController::class, 'edit'])->name('admin.home_slider.edit');
            Route::post('/update', [HomeSliderController::class, 'update'])->name('admin.home_slider.update');
            Route::get('/show/{id}', [HomeSliderController::class, 'show'])->name('admin.home_slider.show');
            Route::delete('/delete/', [HomeSliderController::class, 'delete'])->name('admin.home_slider.delete');

        });
        Route::get('profile', [AdminProfileController::class, 'edit'])->name('admin.edit.profile');
        Route::post('update/general_info', [AdminProfileController::class, 'general_info'])->name('admin.profile.update.general_info');
        Route::post('update/general_info/password', [AdminProfileController::class, 'update_password'])->name('admin.profile.update.update_password');

    });


});
