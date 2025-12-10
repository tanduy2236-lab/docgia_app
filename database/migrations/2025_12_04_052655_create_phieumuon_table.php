<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
       Schema::create('phieumuon', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('docgia_id');
        // $table->unsignedBigInteger('sach_id');
        $table->date('ngay_muon');
        $table->date('ngay_tra')->nullable();
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('phieumuon');
    }
};
