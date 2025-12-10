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
    Schema::table('phieumuon', function (Blueprint $table) {
        if (!Schema::hasColumn('phieumuon', 'han_tra')) {
            $table->date('han_tra')->nullable()->after('ngay_muon');
        }
    });
}

public function down(): void
{
    Schema::table('phieumuon', function (Blueprint $table) {
        if (Schema::hasColumn('phieumuon', 'han_tra')) {
            $table->dropColumn('han_tra');
        }
    });
}

};
