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
        Schema::create('fiches_interventions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('demande_id');
            $table->foreign('demande_id')->references('id')->on('demandes')->onDelete('cascade');
            $table->date('date_arrivee')->nullable();; 
            $table->date('date_sortie')->nullable();
            $table->string('motif_intervention')->nullable();;
            $table->string('Technicien_Nom')->nullable();;
            $table->string('Compte_rendues_Intervention')->nullable();
            $table->string('Proposition_Montant')->nullable();
            $table->enum('statut', ['en_cours', 'completee'])
                ->default('en_cours');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fiche_interventions');
    }
};
