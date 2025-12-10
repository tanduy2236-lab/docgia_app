<?php

namespace App\Http\Controllers;

use App\Models\Docgia;
use Illuminate\Http\Request;

class DocGiaController extends Controller
{
    // Lấy danh sách độc giả
    public function index()
    {
        return Docgia::all(); 
    }

    // Tạo độc giả mới
    public function store(Request $req)
    {
        $data = $req->validate([
            'ho_ten' => 'required|string|max:200',
            'ngay_sinh' => 'nullable|date',
            'so_dien_thoai' => 'nullable|digits_between:9,11|unique:docgia,so_dien_thoai,',
            'email' => 'nullable|email|unique:docgia,email,',
            'dia_chi' => 'nullable|string|max:255',
            'gioi_tinh'=> 'nullable|integer',
            'ngay_cap' => 'nullable|date',
            'ngay_het_han' => 'required|date|after:ngay_cap',
            'trang_thai' => 'nullable|integer'
        ]);

        $data['trang_thai'] = $data['trang_thai'] ?? 1;
$last = Docgia::orderBy('id', 'desc')->first();
$nextId = Docgia::max('id') + 1;


$data['ma_the'] = 'DG' . str_pad($nextId, 4, '0', STR_PAD_LEFT);


    $docGia = DocGia::create($data);

    return response()->json([
        'message' => 'Thêm độc giả thành công',
        'data' => $docGia
    ]);
        return Docgia::create($data);
    }
public function pageIndex()
{
    return view('docgia.index');
}

    // Cập nhật độc giả
    public function update(Request $req, $id)
    {
        $dg = Docgia::findOrFail($id);

        $data = $req->validate([
            'ho_ten' => 'required|string|max:200',
            'ngay_sinh' => 'nullable|date',
            'so_dien_thoai' => 'nullable|digits_between:9,11|unique:docgia,so_dien_thoai,' . $id,
            'email' => 'nullable|email|unique:docgia,email,' . $id,
            'gioi_tinh'=> 'nullable|integer',
            'dia_chi' => 'nullable|string|max:255',
            'ngay_cap' => 'nullable|date',
            'ngay_het_han' => 'required|date|after:ngay_cap',
            'trang_thai' => 'nullable|integer'
        ]);

        $dg->update($data);

        return response()->json(['message' => 'Updated']);
    }

    // Xóa độc giả (SoftDelete)
    public function destroy($id)
    {
        $dg = Docgia::findOrFail($id);
        $dg->delete();

        return response()->json(['message' => 'Deleted']);
    }

    // Toggle trạng thái
    public function toggle($id)
    {
        $dg = Docgia::findOrFail($id);
        $dg->trang_thai = $dg->trang_thai == 1 ? 0 : 1;
        $dg->save();

        return response()->json(['message' => 'Status changed']);
    }
    public function edit($id)
{
    $docgia = Docgia::findOrFail($id);
   return view('docgia.edit', [
    'docgia' => $docgia,
    'id' => $id
]);

}
public function show($id) {
     return Docgia::findOrFail($id); }

}

