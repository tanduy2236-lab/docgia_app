<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DocGiaSeeder extends Seeder
{
    public function run()
    {
        $readers = [];

        for ($i = 1; $i <= 15; $i++) {
            $readers[] = [
                'ma_the' => 'DG' . str_pad($i, 4, '0', STR_PAD_LEFT),
                'ho_ten' => 'Độc Giả ' . $i,
                'ngay_sinh' => '2000-01-01',
                'gioi_tinh' => rand(1, 2),
                'so_dien_thoai' => '090123456' . rand(0, 9),
                'email' => 'docgia'.$i.'@gmail.com',
                'dia_chi' => 'TP. HCM',
                'trang_thai' => 1,
                'ghi_chu' => null,
                'ngay_cap' => Carbon::now()->subYears(1),
                'ngay_het_han' => Carbon::now()->addYears(1),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
        }

        DB::table('docgia')->insert($readers);
    }
}
