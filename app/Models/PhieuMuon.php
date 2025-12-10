<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PhieuMuon extends Model
{
    protected $table = 'phieumuon';

    protected $fillable = [
        'docgia_id',
        'sach_id',       //  BỔ SUNG
        'ngay_muon',
        'ngay_tra',
        'trangthai'
    ];

    public function docgia()
    {
        return $this->belongsTo(Docgia::class, 'docgia_id');
    }

    public function book()
    {
        return $this->belongsTo(Book::class, 'sach_id');   // ĐÚNG
    }
}
// First commit

