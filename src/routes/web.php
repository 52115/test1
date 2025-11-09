<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContactController;

// お問い合わせフォーム関連
Route::get('/', [ContactController::class, 'index'])->name('contact.form');
Route::post('/confirm', [ContactController::class, 'confirm'])->name('contact.confirm');
Route::post('/store', [ContactController::class, 'store'])->name('contact.store');
Route::get('/thanks', [ContactController::class, 'thanks'])->name('contact.thanks');


// Fortifyの認証後のみアクセスできるルート
Route::middleware(['auth'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::delete('/admin/delete/{id}', [AdminController::class, 'destroy'])->name('admin.destroy');
    Route::get('/admin/export', [AdminController::class, 'export'])->name('admin.export');
});

// Fortify使用時のLaravel標準ファイル（空でOK）
require __DIR__.'/auth.php';
