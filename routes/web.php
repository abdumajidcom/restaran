<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ReservationController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Site\CategoryViewController;
use TCG\Voyager\Facades\Voyager;

// Kategoriyalarni ko‘rsatish
Route::get('/categories', [CategoryViewController::class, 'index'])->name('site.categories.index');

// Foydalanuvchilar uchun
Route::get('/', [CategoryViewController::class, 'index'])->name('home');
Route::get('/category/{id}', [CategoryViewController::class, 'show'])->name('category.show');

// Admin panel
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', fn() => view('admin.index'))->name('dashboard');

    Route::resource('reservations', ReservationController::class);
    Route::resource('orders', OrderController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('products', ProductController::class);
});

// Telegram test
Route::get('/test-telegram', function () {
    (new \App\Service\TelegramNotificationService)->sendMessage('✅ Telegramdan salom! Order tayyor!');
    return 'Xabar yuborildi';
});

// Foydalanuvchilar uchun menyu sahifalari
Route::get('/drinks', [PublicController::class, 'drinks'])->name('public.drinks');
Route::get('/foods', [PublicController::class, 'foods'])->name('public.foods');
Route::get('/desserts', [PublicController::class, 'desserts'])->name('public.desserts');

// Faqat view fayllarni test qilish uchun
use Illuminate\Support\Facades\File;

Route::get('/view-files', function () {
    $files = File::allFiles(resource_path('views'));

    $list = [];
    foreach ($files as $file) {
        $list[] = $file->getRelativePathname();
    }

    echo "<pre>";
    print_r($list);
    echo "</pre>";
});
