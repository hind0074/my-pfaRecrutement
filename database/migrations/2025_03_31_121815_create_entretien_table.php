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
        Schema::create('entretien', function (Blueprint $table) {
            $table->id();
            $table->foreignId('recruteur_id')->constrained('recruteurs', 'user_id')->onDelete('cascade');
            $table->foreignId('candidat_id')->constrained('candidats', 'user_id')->onDelete('cascade');
            $table->dateTime('date_heure');
            $table->string('etat')->default('Planifié'); 
            $table->timestamps();
            $table->unique(['recruteur_id', 'candidat_id', 'date_heure']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('entretien');
    }
};
