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
        Schema::table('blogs', function (Blueprint $table) {
            $table->text('short_description')
                ->nullable()
                ->after('image');

            $table->string('meta_title')
                ->nullable()
                ->after('content');

            $table->text('meta_description')
                ->nullable()
                ->after('meta_title');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('blogs', function (Blueprint $table) {
            $table->dropColumn([

                'short_description',

                'meta_title',

                'meta_description'

            ]);
        });
    }
};
