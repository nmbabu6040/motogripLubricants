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
        Schema::table('settings', function (Blueprint $table) {
            $table->string('favicon')->nullable()->after('logo');

            $table->string('whatsapp')->nullable()->after('email');

            $table->text('about_short')->nullable()->after('address');

            $table->string('copyright')->nullable()->after('about_short');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->dropColumn([
                'favicon',
                'whatsapp',
                'about_short',
                'copyright'
            ]);
        });
    }
};
