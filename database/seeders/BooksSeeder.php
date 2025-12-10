<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BooksSeeder extends Seeder
{
    public function run()
    {
        $books = [
            ['title' => 'Lập Trình PHP Cơ Bản', 'author' => 'Nguyễn Văn A', 'year' => 2019],
            ['title' => 'Laravel Từ Zero Đến Hero', 'author' => 'Phạm Quốc Bảo', 'year' => 2021],
            ['title' => 'MySQL Nâng Cao', 'author' => 'Trần Thị C', 'year' => 2020],
            ['title' => 'Cấu Trúc Dữ Liệu & Giải Thuật', 'author' => 'Lê Hoàng Dương', 'year' => 2018],
            ['title' => 'Java OOP Cơ Bản', 'author' => 'Nguyễn Tấn Hưng', 'year' => 2017],
            ['title' => 'Python Cho Người Mới Bắt Đầu', 'author' => 'Đỗ Thị Hằng', 'year' => 2022],
            ['title' => 'Kỹ Thuật Lập Trình C++', 'author' => 'Nguyễn Minh Khoa', 'year' => 2016],
            ['title' => 'Thuật Toán Ứng Dụng', 'author' => 'Hồ Khánh An', 'year' => 2015],
            ['title' => 'Lập Trình Web FullStack', 'author' => 'Võ Mẫn', 'year' => 2023],
            ['title' => 'Phân Tích Hệ Thống', 'author' => 'Bùi Tiến', 'year' => 2020],
        ];

        DB::table('books')->insert($books);
    }
}
