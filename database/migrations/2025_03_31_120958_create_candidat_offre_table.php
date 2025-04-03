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
        Schema::create('candidat_offre', function (Blueprint $table) {
            $table->foreignId('candidat_id')->constrained('candidats', 'user_id')->onDelete('cascade');
            $table->foreignId('offre_id')->constrained('offres')->onDelete('cascade');
            $table->primary(['candidat_id', 'offre_id']); 
            $table->string('cv')->nullable(); 
            $table->date('date_postulation');
            $table->string('etat')->default('En attente'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candidat_offre');
    }
};
