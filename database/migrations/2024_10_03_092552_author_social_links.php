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
        Schema::create('author_social_links', function (Blueprint $table) {
            $table->increments('id')->primary();
            $table->unsignedInteger("author_id")->index();
            $table->foreign('author_id')->references('id')->on('author_details');
            $table->text('links');
            $table->dateTime('created_at')->useCurrent();
            $table->dateTime('updated_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('author_social_links');
    }
};
