<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Docgia extends Model
{
   

    protected $table = 'docgia';
    
   protected $fillable = [
    'ma_the',
    'ho_ten',
    'ngay_sinh',
    'gioi_tinh',   // ← THÊM DÒNG NÀY
    'so_dien_thoai',
    'email',
    'dia_chi',     // ← cái này thì đã có, nhưng kiểm tra lại cho chắc
    'ngay_cap',
    'ngay_het_han',
    'trang_thai'
];
public function phieumuon()
{
    return $this->hasMany(PhieuMuon::class, 'docgia_id');
}


}
