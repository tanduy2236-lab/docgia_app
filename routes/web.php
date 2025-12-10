<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\DocGiaController;
use App\Http\Controllers\PhieuMuonController;
// ==========================
// HOME → redirect về Độc Giả
// ==========================
Route::get('/', function () {
    return redirect('/docgia');
});

// ==========================
// MODULE: ĐỘC GIẢ
// ==========================

// Trang index (hiển thị DataTable)
Route::get('/docgia', [DocGiaController::class, 'pageIndex'])->name('docgia.index');

// Trang tạo
Route::get('/docgia/create', function () {
    return view('docgia.create');
});

// Trang sửa
Route::get('/docgia/{id}/edit', function ($id) {
    return view('docgia.edit', compact('id'));
});

// ==========================
// MODULE: SÁCH (Books)
// ==========================
Route::get('/books', [BookController::class, 'index'])->name('books.index');
Route::post('/books', [BookController::class, 'store'])->name('books.store');
Route::post('/books/{id}', [BookController::class, 'update'])->name('books.update');
Route::get('/books/delete/{id}', [BookController::class, 'destroy'])->name('books.delete');

// ==========================
// MODULE: THỐNG KÊ & BÁO CÁO
// ==========================

// Trang chính
Route::get('/reports', [ReportController::class, 'index'])->name('reports.index');
Route::get('/thong-ke', [ReportController::class, 'index'])->name('thongke.index');


// ==========================
// PHIEU MUON
// ==========================
Route::prefix('phieumuon')->group(function () {

    Route::get('/', [PhieuMuonController::class, 'index'])->name('phieumuon.index');

    Route::get('/add', [PhieuMuonController::class, 'create'])->name('phieumuon.add');

    Route::post('/store', [PhieuMuonController::class, 'store'])->name('phieumuon.store');

    Route::get('/tra/{id}', [PhieuMuonController::class, 'traSach'])->name('phieumuon.tra');

    Route::delete('/{id}', [PhieuMuonController::class, 'delete'])->name('phieumuon.delete');


});
// Route::get('/thongke', [ReportController::class, 'index']);
Route::get('/thong-ke', [App\Http\Controllers\ReportController::class, 'index'])->name('thongke.index');



// ==========================
// API CHO THỐNG KÊ
// ==========================
Route::prefix('api/thongke')->group(function () {

    Route::get('/top-sach', [ReportController::class, 'topSach']);
    Route::get('/tre-han', [ReportController::class, 'treHan']);
    Route::get('/theo-thang', [ReportController::class, 'theoThang']);

});
// test commit
