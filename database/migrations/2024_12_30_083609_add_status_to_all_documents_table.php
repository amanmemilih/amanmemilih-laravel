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
        Schema::table('presidential_documents', function (Blueprint $table) {
            $table->boolean('status')->default(0);
        });

        Schema::table('dpd_documents', function (Blueprint $table) {
            $table->boolean('status')->default(0);
        });

        Schema::table('dpr_documents', function (Blueprint $table) {
            $table->boolean('status')->default(0);
        });

        Schema::table('dprd_district_documents', function (Blueprint $table) {
            $table->boolean('status')->default(0);
        });

        Schema::table('dprd_province_documents', function (Blueprint $table) {
            $table->boolean('status')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('presidential_documents', function (Blueprint $table) {
            $table->dropColumn('status');
        });

        Schema::table('dpd_documents', function (Blueprint $table) {
            $table->dropColumn('status');
        });

        Schema::table('dpr_documents', function (Blueprint $table) {
            $table->dropColumn('status');
        });

        Schema::table('dprd_district_documents', function (Blueprint $table) {
            $table->dropColumn('status');
        });

        Schema::table('dprd_province_documents', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
};
