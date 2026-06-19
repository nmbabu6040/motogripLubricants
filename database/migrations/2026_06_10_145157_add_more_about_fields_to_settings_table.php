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
            $table->string('mission_image')->nullable();

            $table->string('vision_image')->nullable();

            $table->string('chairman_name')->nullable();

            $table->string('chairman_designation')->nullable();

            $table->string('chairman_image')->nullable();

            $table->longText('chairman_message')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->dropColumn([
                'mission_image',
                'vision_image',
                'chairman_name',
                'chairman_designation',
                'chairman_image',
                'chairman_message'
            ]);
        });
    }
};
