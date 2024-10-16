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
        Schema::create('courses_video_details', function (Blueprint $table) {
            $table->increments('id')->primary();
            $table->unsignedInteger("course_id")->index();
            $table->foreign('course_id')->references('id')->on('courses');
            $table->string("name")->nullable();
            $table->string("description")->nullable();
            $table->integer("episode")->nullable();
            $table->integer("duration")->nullable();
            $table->text("links");
            $table->dateTime('created_at')->useCurrent();
            $table->dateTime('updated_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses_video_details');
    }
};

