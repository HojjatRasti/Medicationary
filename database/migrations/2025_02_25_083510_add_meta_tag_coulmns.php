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
        Schema::table('answers', function (Blueprint $table) {
            $table->char('meta_title');
            $table->char('meta_description');
//            $table->longText('body')->after('description');
        });

        Schema::table('podcasts', function (Blueprint $table) {
            $table->char('meta_title');
            $table->char('meta_description');
        });

        Schema::table('posts', function (Blueprint $table) {
            $table->char('meta_title');
            $table->char('meta_description');
        });

        Schema::table('webinars', function (Blueprint $table) {
            $table->char('meta_title');
            $table->char('meta_description');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
