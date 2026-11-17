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
        Schema::create('fiches_accueils', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('demande_id');
            $table->foreign('demande_id')->references('id')->on('demandes')->onDelete('cascade');
            $table->string('type_machine');
            $table->string('accessoires');
            $table->string('informations_commerciale');
            $table->string('informations_technicien')->nullable();
            $table->string('Nom_agent_commercial')->nullable();
            $table->string('Nom_technicien')->nullable();
            $table->enum('statut', ['brouillon', 'completee'])
                ->default('brouillon');
            $table->timestamps();
        });
    }

    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fiches_accueils');
    }
};
