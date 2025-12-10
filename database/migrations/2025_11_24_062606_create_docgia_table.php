<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('docgia', function (Blueprint $table) {
            $table->id();
            $table->string('ma_the', 50)->unique();
            $table->string('ho_ten', 200);
            $table->date('ngay_sinh')->nullable();
            $table->tinyInteger('gioi_tinh')->nullable()->comment('0=Không rõ,1=Nam,2=Nữ');
            $table->string('so_dien_thoai', 20)->nullable();
            $table->string('email', 150)->nullable();
            $table->string('dia_chi', 300)->nullable();
            $table->tinyInteger('trang_thai')->default(1);
            $table->text('ghi_chu')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->index('ho_ten');
            $table->index('so_dien_thoai');
            $table->index('trang_thai');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('docgia');
        
    }
};
