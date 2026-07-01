<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Créer la table clients.
     */
    public function up(): void
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('prenom');
            $table->string('telephone')->unique();
            $table->string('email')->nullable()->unique();
            $table->string('adresse')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Supprimer la table clients.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};