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
        Schema::create('candidates', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('election_id');  // Foreign key
            $table->foreign('election_id')
                  ->references('id')  
                  ->on('elections')  
                  ->onDelete('cascade');
            $table->integer('SerialNumber');
            $table->string('Chairman');
            $table->string('DeputyChairman');
            $table->string('Vision');
            $table->string('Mision');
            $table->string('Photo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candidates');
    }
};
