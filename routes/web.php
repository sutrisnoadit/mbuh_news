<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    LikeController, 
    NewsController, 
    UserController, 
    AdminController, 
    LoginController, 
    CategoryController, 
    NotificationController
};

Route::get('/', [NewsController::class, 'index'])->name('index');
Route::get('/news/{news}/show', [NewsController::class, 'show'])->name('news.show');
Route::post('/news/{news}/like', [LikeController::class, 'likeNews'])->name('news.like');
Route::get('/news/{categories}/category', [NewsController::class, 'viewCategory'])->name('news.viewCategory');

Route::middleware(['guest'])->group(function () {
    Route::get('/login', [LoginController::class, 'login'])->name('login');
    Route::post('/login/submit', [LoginController::class, 'loginSubmit'])->name('login.submit');
    Route::get('/register', [LoginController::class, 'register'])->name('register');
    Route::post('/register/submit', [LoginController::class, 'registerSubmit'])->name('register.submit');
});

Route::middleware(['auth', 'online.status'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    Route::get('/news/{news}/view', [NewsController::class, 'view'])->name('news.view');

    Route::resource('profile', UserController::class)->parameters([
        'profile' => 'user'
    ])->only([
        'edit',
        'update'
    ]);

    Route::prefix('notifications')->name('notifications.')->group(function () {
        Route::get('/count', [NotificationController::class, 'unreadNotificationsCount'])->name('count');
        Route::get('/fetch', [NotificationController::class, 'fetchNotifications'])->name('fetch');
        Route::post('/{id}/read', [NotificationController::class, 'markAsRead'])->name('markAsRead');
    });
});

Route::middleware(['role:Super Admin'])->group(function () {
    Route::resource('admin/news', NewsController::class)->names('admin.news')->only([
        'destroy'
    ]);
    Route::get('/admin/news/manage', [NewsController::class, 'manage'])->name('admin.news.manage');
    Route::resource('admin/category', CategoryController::class)->names('admin.category')->only([
        'store',
        'update',
        'destroy'
    ]);
    Route::get('/admin/category/manage', [CategoryController::class, 'manage'])->name('admin.category.manage');
    Route::resource('admin/users', UserController::class)->only(['index', 'destroy'])
        ->names([
            'index' => 'admin.users.manage',
            'destroy' => 'admin.users.destroy'
        ]);

    Route::patch('/admin/users/{user}/assignRole', [UserController::class, 'assignRole'])->name('admin.users.assignRole');
});

Route::group(['middleware' => ['permission:Status News|Update Status News']], function () {
    Route::get('/news/status', [NewsController::class, 'status'])->name('news.status');
    Route::patch('/news/{news}/updatestatus', [NewsController::class, 'updateStatus'])->name('news.updateStatus');
});

Route::group(['middleware' => ['permission:Create News|Store News|Edit News|Update News|Draft']], function () {
    Route::resource('news', NewsController::class)->names('news')->only([
        'create',
        'store',
        'edit',
        'update'
    ]);
    Route::get('/news/draft', [NewsController::class, 'draft'])->name('news.draft');
});
