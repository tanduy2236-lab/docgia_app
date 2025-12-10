<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DocGiaController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\PhieuMuonController;
use App\Http\Controllers\ReportController;
Route::get('/test-api', function () {
    return 'API OK';
});
// Route mặc định của Laravel
Route::middleware('auth')->get('/user', function (Request $request) {
    return $request->user();
});

// ===========================
//  ROUTES CHO ĐỘC GIẢ
// ===========================


Route::get('/docgia', [DocGiaController::class, 'index']); // trả JSON cho DataTables
Route::post('/docgia', [DocGiaController::class, 'store']);
Route::put('/docgia/{id}', [DocGiaController::class, 'update']);
Route::delete('/docgia/{id}', [DocGiaController::class, 'destroy']);
Route::get('/docgia/{id}', [DocGiaController::class, 'show']);
Route::put('/docgia/{id}/toggle', [DocGiaController::class, 'toggle']);


Route::get('/sach', [BookController::class, 'index']);
Route::post('/phieumuon', [PhieuMuonController::class, 'store']);
Route::delete('phieumuon/{id}', [PhieuMuonController::class, 'delete']);

Route::get('/thongke/top-sach', [ReportController::class, 'topSach']);
Route::get('/thongke/tre-han', [ReportController::class, 'treHan']);
Route::get('/thongke/theo-thang', [ReportController::class, 'theoThang']);

Route::prefix('thongke')->group(function () {

    Route::get('/top-sach', [ReportController::class, 'topSach']);

    Route::get('/tre-han', [ReportController::class, 'treHan']);

    Route::get('/theo-thang', [ReportController::class, 'theoThang']);
});
Route::prefix('thongke')->group(function () {
    Route::get('/top-sach', [ReportController::class, 'topSach']);
    Route::get('/tre-han', [ReportController::class, 'treHan']);
});