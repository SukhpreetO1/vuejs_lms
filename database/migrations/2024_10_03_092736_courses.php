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
        Schema::create('courses', function (Blueprint $table) {
            $table->increments('id')->primary();
            $table->unsignedInteger("user_id")->index();
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedInteger("author_id")->index();
            $table->foreign('author_id')->references('id')->on('author_details');
            $table->unsignedInteger("course_id")->index();
            $table->foreign('course_id')->references('id')->on('course_topics');
            $table->string('title');
            $table->text('description')->nullable();
            $table->dateTime('created_at')->useCurrent();
            $table->dateTime('updated_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
