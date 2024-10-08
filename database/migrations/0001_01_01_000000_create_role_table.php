<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->increments('id')->primary();
            $table->string('name')->unique();
            $table->integer('value')->unique();
            $table->dateTime('created_at')->useCurrent();
            $table->dateTime('updated_at')->useCurrent();
        });

        $roles = [
            ['name' => 'Admin', 'value' => 1],
            ['name' => 'User', 'value' => 2],
        ];
    
        foreach ($roles as $role) {
            DB::table('roles')->insert($role);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('roles');
    }
};
