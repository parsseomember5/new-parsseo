<?php

use App\Http\Controllers\Admin\ChaptersController;
use App\Http\Controllers\Admin\FeedbacksController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\LogosController;
use App\Http\Controllers\Admin\MenuItemsController;
use App\Http\Controllers\Admin\MenusController;
use App\Http\Controllers\Admin\PagesController;
use App\Http\Controllers\Admin\PanelController;
use App\Http\Controllers\Admin\PortfolioCategoriesController;
use App\Http\Controllers\Admin\PortfoliosController;
use App\Http\Controllers\Admin\PostCategoriesController;
use App\Http\Controllers\Admin\PostsController;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\TagsController;
use App\Http\Controllers\Front\IndexController;
use Illuminate\Support\Facades\Artisan;
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

// Views Clear:
Route::get('/views-clear', function() {
    Artisan::call('view:clear');
    return '<h1>Views Cleared!</h1>';
});

//Clear configurations:
Route::get('/config-clear', function() {
    Artisan::call('config:clear');
    return '<h1>Configurations cleared</h1>';
});

//Clear cache:
Route::get('/cache-clear', function() {
    Artisan::call('cache:clear');
    return '<h1>Cache cleared</h1>';
});

//Clear cache:
Route::get('/optimize-me', function() {
    Artisan::call('optimize:clear');
    return '<h1>optimized!</h1>';
});

//migrate:
Route::get('/migrate-me', function() {
    Artisan::call('migrate');
    return '<h1>migrated!</h1>';
});


// *********************** Admin Routes ***************
Route::prefix('admin')->group(function (){

    Route::get('login',[LoginController::class,'showLoginForm'])->name('admin.login');
    Route::post('login',[LoginController::class,'login'])->name('admin.do_login');

    Route::middleware('auth:admin')->group(function (){
        Route::get('logout',[LoginController::class,'logout'])->name('admin.logout');
        Route::get('dashboard',[PanelController::class,'dashboard'])->name('admin.dashboard');

        // profile
        Route::get('profile',[ProfileController::class,'index'])->name('admin.profile');
        Route::get('profile/security',[ProfileController::class,'security'])->name('admin.profile.security');
        Route::post('profile/update/{admin}',[ProfileController::class,'update'])->name('admin.update');
        Route::post('profile/update/password/{admin}',[ProfileController::class,'resetPassword'])->name('admin.update.password');

        // posts
        Route::post('posts/get-translations',[PostsController::class,'getTranslations']);
        Route::get('posts/trash',[PostsController::class,'trash'])->name('posts.trash');
        Route::post('posts/empty/trash',[PostsController::class,'emptyTrash'])->name('posts.trash.empty');
        Route::post('posts/restore/{id}',[PostsController::class,'restore'])->name('posts.restore');
        Route::post('posts/force-delete',[PostsController::class,'forceDelete'])->name('posts.delete.force');
        Route::get('posts/search/trash',[PostsController::class,'searchTrash'])->name('posts.search.trash');
        Route::get('posts/search',[PostsController::class,'search'])->name('posts.search');
        Route::resource('posts',PostsController::class);
        Route::post('posts/ajax-delete',[PostsController::class,'ajaxDelete']);


        // product
        Route::get('products/trash',[ProductsController::class,'trash'])->name('products.trash');
        Route::post('products/empty/trash',[ProductsController::class,'emptyTrash'])->name('products.trash.empty');
        Route::post('products/restore/{id}',[ProductsController::class,'restore'])->name('products.restore');
        Route::post('products/force-delete',[ProductsController::class,'forceDelete'])->name('products.delete.force');
        Route::get('products/search/trash',[ProductsController::class,'searchTrash'])->name('products.search.trash');
        Route::get('products/search',[ProductsController::class,'search'])->name('products.search');
        Route::post('products/ajax-delete',[ProductsController::class,'ajaxDelete']);
        Route::resource('products',ProductsController::class);


        // tags
        Route::get('tags/search',[TagsController::class,'search'])->name('tags.search');
        Route::resource('tags',TagsController::class);

        // chapters
        Route::get('chapters/search',[ChaptersController::class,'search'])->name('chapters.search');
        Route::post('chapters/parents',[ChaptersController::class,'getParents'])->name('chapters.parents');
        Route::resource('chapters',ChaptersController::class);

        // post categories
        Route::get('post-categories/search',[PostCategoriesController::class,'search'])->name('post-categories.search');
        Route::resource('post-categories',PostCategoriesController::class);

        // portfolios
        Route::post('portfolios/get-translations',[PortfoliosController::class,'getTranslations']);
        Route::get('portfolios/trash',[PortfoliosController::class,'trash'])->name('portfolios.trash');
        Route::post('portfolios/empty/trash',[PortfoliosController::class,'emptyTrash'])->name('portfolios.trash.empty');
        Route::post('portfolios/restore/{id}',[PortfoliosController::class,'restore'])->name('portfolios.restore');
        Route::post('portfolios/force-delete',[PortfoliosController::class,'forceDelete'])->name('portfolios.delete.force');
        Route::get('portfolios/search/trash',[PortfoliosController::class,'searchTrash'])->name('portfolios.search.trash');
        Route::get('portfolios/search',[PortfoliosController::class,'search'])->name('portfolios.search');
        Route::resource('portfolios',PortfoliosController::class);
        Route::post('portfolios/ajax-delete',[PortfoliosController::class,'ajaxDelete']);

        // portfolio categories
        Route::get('portfolio-categories/search',[PortfolioCategoriesController::class,'search'])->name('portfolio-categories.search');
        Route::resource('portfolio-categories',PortfolioCategoriesController::class);

        // pages
        Route::get('pages/trash',[PagesController::class,'trash'])->name('pages.trash');
        Route::post('pages/empty/trash',[PagesController::class,'emptyTrash'])->name('pages.trash.empty');
        Route::post('pages/restore/{id}',[PagesController::class,'restore'])->name('pages.restore');
        Route::post('pages/force-delete',[PagesController::class,'forceDelete'])->name('pages.delete.force');
        Route::get('pages/search/trash',[PagesController::class,'searchTrash'])->name('pages.search.trash');
        Route::get('pages/search',[PagesController::class,'search'])->name('pages.search');
        Route::resource('pages',PagesController::class);
        Route::post('pages/ajax-delete',[PagesController::class,'ajaxDelete']);

        // settings
        Route::prefix('settings')->group(function (){
            Route::get('general',[SettingsController::class,'general'])->name('settings.general');
            Route::post('general/update',[SettingsController::class,'updateGeneral'])->name('settings.general_update');
            Route::get('portfolios',[SettingsController::class,'portfolios'])->name('settings.portfolios');
            Route::post('portfolios/update',[SettingsController::class,'updatePortfolios'])->name('settings.portfolios_update');
            Route::get('features',[SettingsController::class,'features'])->name('settings.features');
            Route::post('features/update',[SettingsController::class,'updateFeatures'])->name('settings.features_update');
            Route::get('hero',[SettingsController::class,'hero'])->name('settings.hero');
            Route::post('hero/update',[SettingsController::class,'updateHero'])->name('settings.hero_update');
            Route::get('about',[SettingsController::class,'about'])->name('settings.about');
            Route::post('about/update',[SettingsController::class,'updateAbout'])->name('settings.about_update');
            Route::get('articles',[SettingsController::class,'articles'])->name('settings.articles');
            Route::post('articles/update',[SettingsController::class,'updateArticles'])->name('settings.articles_update');
            Route::get('counters',[SettingsController::class,'counters'])->name('settings.counters');
            Route::post('counters/update',[SettingsController::class,'updateCounters'])->name('settings.counters_update');
            Route::get('events',[SettingsController::class,'events'])->name('settings.events');
            Route::post('events/update',[SettingsController::class,'updateEvents'])->name('settings.events_update');
            Route::get('feedbacks',[SettingsController::class,'feedbacks'])->name('settings.feedbacks');
            Route::post('feedbacks/update',[SettingsController::class,'updateFeedbacks'])->name('settings.feedbacks_update');
            Route::get('contact-us',[SettingsController::class,'contactUs'])->name('settings.contact_us');
            Route::post('contact-us/update',[SettingsController::class,'updateContactUs'])->name('settings.contact_us_update');
            Route::get('about-us',[SettingsController::class,'aboutUs'])->name('settings.about_us');
            Route::post('about-us/update',[SettingsController::class,'updateAboutUs'])->name('settings.about_us_update');

            Route::get('seo',[SettingsController::class,'seo'])->name('settings.seo');
            Route::post('seo/update',[SettingsController::class,'updateSeo'])->name('settings.seo_update');
            Route::get('webdesign',[SettingsController::class,'webDesign'])->name('settings.webdesign');
            Route::post('webdesign/update',[SettingsController::class,'webDesignUpdate'])->name('settings.webdesign_update');
            Route::get('appdesign',[SettingsController::class,'appDesign'])->name('settings.appdesign');
            Route::post('appdesign/update',[SettingsController::class,'appDesignUpdate'])->name('settings.appdesign_update');
        });

        // feedbacks
        Route::post('feedbacks/get-translations',[FeedbacksController::class,'getTranslations']);
        Route::get('feedbacks/search',[FeedbacksController::class,'search'])->name('feedbacks.search');
        Route::resource('feedbacks',FeedbacksController::class);

        // logos
        Route::get('logos/search',[LogosController::class,'search'])->name('logos.search');
        Route::resource('logos',LogosController::class);

        // menus
        Route::get('menus/search',[MenusController::class,'search'])->name('menus.search');
        Route::post('menus/get-items',[MenuItemsController::class,'getItems']);
        Route::resource('menus',MenusController::class);

        // menu items
        Route::get('menu-items/search',[MenuItemsController::class,'search'])->name('menu-items.search');
        Route::resource('menu-items',MenuItemsController::class);

        // contact requests
        Route::get('contacts/search',[PanelController::class,'searchContacts'])->name('contacts.search');
        Route::get('contacts',[PanelController::class,'contactRequest'])->name('contacts.index');
    });

});


// *********************** Site Routes ***************
Route::get('/',[IndexController::class,'home'])->name('home');
Route::get('/contact-us/',[IndexController::class,'contactUs'])->name('contact_us');
Route::get('/about-us/',[IndexController::class,'aboutUs'])->name('about_us');
Route::get('/seo/',[IndexController::class,'seo'])->name('seo');
Route::get('/web-design/',[IndexController::class,'webDesign'])->name('web_design');
Route::get('/app-design/',[IndexController::class,'appDesign'])->name('app_design');
Route::get('/article/{post}/',[IndexController::class,'article'])->name('post.show');
Route::get('/articles/',[IndexController::class,'articles'])->name('posts');
Route::get('/portfolio/{portfolio}/',[IndexController::class,'portfolio'])->name('portfolio.show');
Route::get('/portfolios/',[IndexController::class,'portfolios'])->name('portfolios');
Route::get('/{page}/',[IndexController::class,'page'])->name('page.show');
Route::get('/category/{category}/',[IndexController::class,'postCategory'])->name('post_category.show');
Route::get('/portfolio-cat/{category}/',[IndexController::class,'portfolioCategory'])->name('portfolio_category.show');
Route::get('/tag/{tag}/',[IndexController::class,'tag'])->name('tag.show');
Route::get('/search/',[IndexController::class,'search'])->name('search');
Route::post('/change-lang',[IndexController::class,'changeLang'])->name('change_lang');
Route::post('contact-form',[IndexController::class,'storeContact'])->name('contact_form');
