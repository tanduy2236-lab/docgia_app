<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
   Schema::table('phieumuon', function (Blueprint $table) {
        if (!Schema::hasColumn('phieumuon', 'sach_id')) {
            $table->unsignedBigInteger('sach_id')->after('docgia_id');
        }
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
          Schema::table('phieumuon', function (Blueprint $table) {
        if (Schema::hasColumn('phieumuon', 'sach_id')) {
            $table->dropColumn('sach_id');
        }
    });
    }
};
