<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\ProfileController;
use App\Http\Controllers\Front\PostController as FrontPostController;
use App\Http\Controllers\Front\CategoryController as FrontCategoryController;
use App\Http\Controllers\Front\CommentController;
use App\Http\Controllers\Front\PageController as FrontPageController;
use App\Http\Controllers\Front\TagController as FrontTagController;
use App\Http\Controllers\LanguageController;
use Illuminate\Support\Facades\App;
use App\View\Components\BlogLayout;
use App\Http\Controllers\Front\OverviewController;


// FrontEnd Routes [Public routes]
Route::get('/', [HomeController::class, 'index'])->name('webhome');
// Route::get('/tong-quan', [OverviewController::class, 'index'])->name('overview');
Route::post('/post/comment/{post}', [CommentController::class,'makeComment'])->name('post.comment');
Route::resource('/comment', CommentController::class, ['only' => ['destroy']]);
Route::get('/post/{slug}', [FrontPostController::class, 'getPostBySlug'])->name('post.show');
Route::get('/category/{slug}', [FrontCategoryController::class, 'getCategoryBySlug'])->name('category.show');
Route::get('/page/{slug}', [FrontPageController::class, 'getPageBySlug'])->name('page.show');
Route::get('/tag/{slug}', [FrontTagController::class, 'getPostsPerTags'])->name('tag.show');

// Route::get('/', function (string $locale) {
//      $locale = App::getLocale();
//     App::setLocale($locale);

//     $blogLayout = new BlogLayout();
//     return $blogLayout->render();
// });

Route::get('/login/{locale}', function (string $locale) {
    if (! in_array($locale, ['vi', 'en'])) {
        abort(400);
    }
    App::setLocale($locale);
    
    return view('auth.login');
    
});

Route::get('/forgot-password/{locale}', function (string $locale) {
    if (! in_array($locale, ['vi', 'en'])) {
        abort(400);
    }
    App::setLocale($locale);
    
    return view('auth.forgot-password');
    
});

Route::get('/register/{locale}', function (string $locale) {
    if (! in_array($locale, ['vi', 'en'])) {
        abort(400);
    }
    App::setLocale($locale);
    
    return view('auth.register');
    
});

Route::get('/tong-quan', function () {
    return view('pages.overview');
})->name('overview');




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/lang/{lang?}', function($lang){
    app()->setLocale($lang);
    session()->put('locale', $lang);
    return redirect()->route("webhome");
})->name('lang');