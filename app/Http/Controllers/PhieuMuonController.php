<?php

namespace App\Http\Controllers;

use App\Models\PhieuMuon;
use App\Models\Docgia;
use App\Models\Book;
use Illuminate\Http\Request;

class PhieuMuonController extends Controller
{
    public function index()
    {
        $list = PhieuMuon::with(['docgia', 'book'])
            ->orderBy('id', 'DESC')
            ->get();

        return view('phieumuon.index', compact('list'));
    }

    public function create()
    {
        $docgia = Docgia::all();
        $sach   = Book::all();

        return view('phieumuon.create', compact('docgia', 'sach'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'docgia_id' => 'required|exists:docgia,id',
            'sach_id'   => 'required|exists:books,id',
            'ngay_muon' => 'required|date',
        ]);

        PhieuMuon::create([
            'docgia_id' => $request->docgia_id,
            'sach_id'   => $request->sach_id,
            'ngay_muon' => $request->ngay_muon,
            'trangthai' => 'Đang mượn',
            'ngay_tra'  => null,
        ]);

        return redirect('/phieumuon')->with('success', 'Thêm phiếu mượn thành công!');
    }

    public function traSach($id)
    {
        $pm = PhieuMuon::findOrFail($id);
        $pm->update([
            'trangthai' => 'Đã trả',
            'ngay_tra' => now()->toDateString(),
        ]);

        return back()->with('success', 'Đã trả sách');
    }

 public function delete($id)
{
    $pm = PhieuMuon::find($id);

    if (!$pm) {
        return response()->json(['error' => 'Không tìm thấy phiếu mượn'], 404);
    }

    try {
        $pm->delete();
        return response()->json(['message' => 'Xóa thành công']);
    } catch (\Throwable $e) {
        return response()->json(['error' => $e->getMessage()], 500);
    }
}



}

