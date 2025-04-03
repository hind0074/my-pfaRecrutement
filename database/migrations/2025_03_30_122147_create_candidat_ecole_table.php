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
        Schema::create('candidat_ecole', function (Blueprint $table) {
            $table->foreignId('candidat_id')->references('user_id')->on('candidats')->onDelete('cascade');
            $table->foreignId('ecole_id')->constrained('ecoles')->onDelete('cascade');
            $table->primary(['candidat_id', 'ecole_id']); // Définir la clé primaire composite
            $table->string('diplome')->nullable(); 
            $table->date('date_debut')->nullable(); 
            $table->date('date_fin')->nullable(); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candidat_ecole');
    }
};
