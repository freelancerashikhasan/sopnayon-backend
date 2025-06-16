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
        Schema::table('site_settings', function (Blueprint $table) {
            $table->longText('chairman_text_bn')->nullable()->after('chairman_text');
            $table->longText('secretary_text_bn')->nullable()->after('secretary_text');
            $table->longText('about_us_bn')->nullable()->after('about_us');
            $table->longText('terms_and_condition_bn')->nullable()->after('terms_and_condition');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('site_settings', function (Blueprint $table) {
            $table->dropColumn('chairman_text_bn');
            $table->dropColumn('secretary_text_bn');
            $table->dropColumn('about_us_bn');
            $table->dropColumn('terms_and_condition_bn');
        });
    }
};
