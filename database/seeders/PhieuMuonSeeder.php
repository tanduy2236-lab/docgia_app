<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PhieuMuonSeeder extends Seeder
{
    public function run()
    {
        $records = [];

        for ($i = 1; $i <= 50; $i++) {

            $ngayMuon = Carbon::now()->subDays(rand(1, 40));  // ngày mượn từ 1–40 ngày
            $tra = rand(0, 1); // 50% đã trả – 50% chưa trả

            $records[] = [
                'docgia_id' => rand(1, 15),
                'sach_id' => rand(1, 10),
                'ngay_muon' => $ngayMuon,
                'ngay_tra' => $tra ? $ngayMuon->copy()->addDays(rand(1, 20)) : null,
                'trangthai' => $tra ? 'Đã trả' : 'Đang mượn',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
        }

        DB::table('phieumuon')->insert($records);
    }
}
