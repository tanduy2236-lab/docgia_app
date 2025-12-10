<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Book;
use App\Models\Reader;
use App\Models\PhieuMuon;

class ReportController extends Controller
{
    // ---------------- TOP 10 SÁCH MƯỢN NHIỀU ----------------
    public function topSach()
{
    $data = DB::table('phieumuon')
        ->join('books', 'phieumuon.sach_id', '=', 'books.id')
        ->select('books.title', DB::raw('COUNT(*) as so_lan'))
        ->groupBy('books.title')
        ->orderByDesc('so_lan')
        ->limit(10)
        ->get();

    return response()->json(['data' => $data]);
}


    // ---------------- ĐỘC GIẢ TRỄ HẠN ----------------
 public function treHan()
{
    $data = DB::table('phieumuon')
        ->join('docgia', 'phieumuon.docgia_id', '=', 'docgia.id')
        ->join('books', 'phieumuon.sach_id', '=', 'books.id')
        ->whereNull('phieumuon.ngay_tra')
        ->select(
            'docgia.ho_ten as docgia',
            'books.title as sach',
            'phieumuon.ngay_muon',
            DB::raw('DATE_ADD(phieumuon.ngay_muon, INTERVAL 7 DAY) as han_tra'),
            DB::raw('DATEDIFF(NOW(), DATE_ADD(phieumuon.ngay_muon, INTERVAL 7 DAY)) as tre_han'),
            'phieumuon.trangthai'
        )
        ->having('tre_han', '>', 0)
        ->get();

    return response()->json(['data' => $data]);
}




    // ---------------- THỐNG KÊ THEO THÁNG ----------------
   public function theoThang()
{
    $data = DB::table('phieumuon')
        ->select(
            DB::raw('MONTH(created_at) as thang'),
            DB::raw('COUNT(*) as so_luong')
        )
        ->groupBy('thang')
        ->orderBy('thang')
        ->get();

    return response()->json(['data' => $data]);
}


    // ---------------- TRANG GIAO DIỆN THỐNG KÊ ----------------
    public function index()
    {
        return view('reports.index');
    }
}
