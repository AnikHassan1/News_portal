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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->integer('cat_id');
            $table->integer('sub_cat_id');
            $table->integer('dis_id');
            $table->integer('sub_dis_id');
            $table->integer('user_id');
            $table->string('title_en')->nullable();
            $table->string('title_bn');
            $table->string('image');
            $table->text('details_en')->nullable();
            $table->text('details_bn');
            $table->text('tags_bn');
            $table->text('tags_en')->nullable();
            $table->integer('headline')->nullable();
            $table->integer('first_section')->nullable();
            $table->integer('first_section_thumnail')->nullable();
            $table->integer('bigthumnail')->nullable();
            $table->string('post_date')->nullable();
            $table->string('post_month')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
