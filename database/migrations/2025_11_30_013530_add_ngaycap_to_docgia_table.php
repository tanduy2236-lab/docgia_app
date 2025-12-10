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
        Schema::table('docgia', function (Blueprint $table) {
        $table->date('ngay_cap')->nullable();
        $table->date('ngay_het_han')->nullable();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('docgia', function (Blueprint $table) {
        $table->dropColumn(['ngay_cap', 'ngay_het_han']);
    });
    }
};
