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
        Schema::create('hm_user', function (Blueprint $table) {
            $table->id(); // auto increment
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->timestamps(); // kalau mau pakai created_at, updated_at
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hm_user');
    }
};
