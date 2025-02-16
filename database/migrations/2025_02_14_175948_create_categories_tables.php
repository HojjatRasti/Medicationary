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
        Schema::create('webinar_categories', function (Blueprint $table) {
            $table->id();
            $table->char('title',255);
            $table->timestamps();
        });
        Schema::table('webinars', function (Blueprint $table) {
            $table->dropColumn(['category']);
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('webinar_categories')->onDelete('cascade');        });

        Schema::create('answer_categories', function (Blueprint $table) {
            $table->id();
            $table->char('title',255);
            $table->timestamps();
        });
        Schema::table('answers', function (Blueprint $table) {
            $table->dropColumn(['category']);
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('answer_categories')->onDelete('cascade');        });

        Schema::create('post_categories', function (Blueprint $table) {
            $table->id();
            $table->char('title',255);
            $table->timestamps();
        });
        Schema::table('posts', function (Blueprint $table) {
            $table->dropColumn(['category']);
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('post_categories')->onDelete('cascade');        });

        Schema::create('podcast_categories', function (Blueprint $table) {
            $table->id();
            $table->char('title',255);
            $table->timestamps();
        });
        Schema::table('podcasts', function (Blueprint $table) {
            $table->dropColumn(['category']);
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('podcast_categories')->onDelete('cascade');        });

        Schema::table('posts', function (Blueprint $table) {
           $table->longText('body')->after('abstract');
            });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories_tables');
    }
};
