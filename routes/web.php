<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CompanyController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\Page\PageController;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\FeatureAndAnimateController;

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

// Route::get('/', function () {
//     return view('home');
// });

Route::get('/',[FrontendController::class,'home'])->name('home');

Route::get('/about',[FrontendController::class,'about'])->name('about');
Route::get('/company',[FrontendController::class,'company'])->name('company');
Route::get('/company/{slug}/details',[FrontendController::class,'companyDetails'])->name('company.details');

Route::get('/buyers',[FrontendController::class,'buyer'])->name('buyer');
Route::get('/landowner',[FrontendController::class,'landowner'])->name('landowner');
Route::get('/contact',[FrontendController::class,'contact'])->name('contact');


Route::post('/contact-store',[FrontendController::class,'userContactStore'])->name('user.contact');



Route::get('/projects/{slug}',[FrontendController::class,'project'])->name('project');
Route::get('/all-project',[FrontendController::class,'allProject'])->name('all.project');

Route::get('/project-details/{slug}',[FrontendController::class,'projectDetails'])->name('project.details');
Route::get('/projects/{slug}/{status}',[FrontendController::class,'statusWiseProject'])->name('project.status');



Route::prefix('admin')->group(function () {
    Route::get('login',[LoginController::class,'showLoginForm'])->name('login');
    Route::post('login',[LoginController::class,'adminLogin'])->name('admin.login');
     Route::middleware('auth:admin')->group(function () {
        Route::resource('admin', AdminController::class);
        Route::get('/admin-delete/{id}',[AdminController::class,'delete'])->name('admin.delete');


        Route::get('logout',[AdminController::class,'adminLogout'])->name('admin.logout');

        Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

        Route::get('/page-index',[PageController::class,'homePageIndex'])->name('homePage.index');

        Route::get('/page-create',[PageController::class,'homePageCreateForm'])->name('homePage.create');
        Route::post('/page-create',[PageController::class,'homePageStore'])->name('homePage.store');
        Route::get('/page-edit/{id}',[PageController::class,'homePageEdit'])->name('homePage.edit');
        Route::post('/page-edit/{id}',[PageController::class,'homePageUpdate'])->name('homePage.update');
        Route::post('/page-edit/{id}',[PageController::class,'homePageUpdate'])->name('homePage.update');

        Route::get('/page-delete/{id}',[PageController::class,'homePageDelete'])->name('homePage.delete');


        Route::get('/project-page-create',[PageController::class,'projectPageCreateForm'])->name('projectPage.create');
        Route::get('/project-page-index',[PageController::class,'projectPageIndex'])->name('projectPage.index');

        Route::get('/project-page-edit/{id}',[PageController::class,'projectPageEdit'])->name('projectPage.edit');
        Route::post('/project-page-edit/{id}',[PageController::class,'projectPageUpdate'])->name('projectPage.update');

        Route::post('/project/page-store',[PageController::class,'projectPageStore'])->name('page.project.store');


        Route::resource('featurs',FeatureAndAnimateController::class);

        
        Route::get('/feature-delete/{id}',[FeatureAndAnimateController::class,'delete'])->name('feature.delete');
        
        Route::resource('categories',CategoryController::class);
        Route::get('/categories-delete/{id}',[CategoryController::class,'delete'])->name('category.delete');

        Route::name('admin.')->group(function () {
            Route::resource('/projects',ProjectController::class);
        
            Route::get('/project-delete/{id}',[ProjectController::class,'delete'])->name('projects.delete');
            Route::get('/project/ongoing',[ProjectController::class,'ongoingProjects'])->name('projects.ongoing');
            Route::get('/project/upcoming',[ProjectController::class,'upcomingProjects'])->name('projects.upcoming');
            Route::get('/project/completed',[ProjectController::class,'completedProjects'])->name('projects.completed');

            Route::get('/progress-image-delete',[ProjectController::class,'deleteProgressImage'])->name('progress.deleteImage');
            Route::get('/gallery-image-delete',[CompanyController::class,'deleteGalleryImage'])->name('gallery.deleteImage');
            Route::get('/company-delete/{id}',[CompanyController::class,'delete'])->name('company.delete');


            Route::resource('company',CompanyController::class);


        
        
        
        });
        
   });
});













