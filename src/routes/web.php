<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContactController;

/*
|--------------------------------------------------------------------------
| お問い合わせフォーム関連（一般ユーザー向け）
|--------------------------------------------------------------------------
*/
Route::get('/', [ContactController::class, 'index'])->name('contact.form');
Route::post('/confirm', [ContactController::class, 'confirm'])->name('contact.confirm');
Route::post('/store', [ContactController::class, 'store'])->name('contact.store');
Route::get('/thanks', [ContactController::class, 'thanks'])->name('contact.thanks');

/*
|--------------------------------------------------------------------------
| 管理画面（認証後のみアクセス可能）
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {
    // 管理トップ
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    
    // CSVエクスポート
    Route::get('/admin/export', [AdminController::class, 'export'])->name('admin.export');

    // データ削除（確認なし・モーダル内ボタン）
    Route::delete('/admin/{id}', [AdminController::class, 'destroy'])->name('admin.destroy');
});

/*
|--------------------------------------------------------------------------
| Fortify 使用時の標準ルート（内容は空でOK）
|--------------------------------------------------------------------------
*/
require __DIR__.'/auth.php';
