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
        Schema::table('entretien', function (Blueprint $table) {
            $table->unsignedBigInteger('offre_id')->nullable();
        
            $table->foreign('offre_id')->references('id')->on('offres')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('entretien', function (Blueprint $table) {
            //
        });
    }
};
