<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Créer la table pivot reparation_technicien.
     */
    public function up(): void
    {
        Schema::create('reparation_technicien', function (Blueprint $table) {
            $table->id();
            $table->foreignId('reparation_id')->constrained('reparations')->cascadeOnDelete();
            $table->foreignId('technicien_id')->constrained('techniciens')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Supprimer la table pivot en cas de rollback.
     */
    public function down(): void
    {
        Schema::dropIfExists('reparation_technicien');
    }
};