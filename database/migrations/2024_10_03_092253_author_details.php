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
        Schema::create('author_details', function (Blueprint $table) {
            $table->increments('id')->primary();
            $table->string('name');
            $table->unsignedInteger("user_id")->index();
            $table->foreign('user_id')->references('id')->on('users');
            $table->text('desctiption');
            $table->dateTime('created_at')->useCurrent();
            $table->dateTime('updated_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('author_details');
    }
};
