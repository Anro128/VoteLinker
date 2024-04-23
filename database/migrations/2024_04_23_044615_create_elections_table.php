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
        Schema::create('elections', function (Blueprint $table) {
            $table->id();
            $table->string('Title');
            $table->string('Description')->nullable();
            $table->boolean('IsOpen')->default(False);
            $table->boolean('IsPublicResult')->default(False);
            $table->json('Scope');
            $table->json('ListFinishVoting');
            $table->json('Result');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('elections');
    }
};
