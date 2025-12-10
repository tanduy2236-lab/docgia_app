<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = 'books';

    protected $fillable = ['title', 'author', 'year'];

    public function phieumuon()
    {
        return $this->hasMany(PhieuMuon::class, 'sach_id');   // ⬅️ SỬA books_id → sach_id
    }
}
