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
        Schema::create('temp_regists', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('NIM')->unique();
            $table->string('fakultas');
            $table->string('departemen');
            $table->string('email')->unique();
            $table->enum('role', ['admin', 'voter'])->default('voter');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('KTM');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('temp_regists');
    }
};
