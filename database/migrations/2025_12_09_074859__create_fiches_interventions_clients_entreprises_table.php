<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


return new class extends Migration
{
    public function up(): void
    {
        Schema::create('fiches_interventions_clients_entreprises', function (Blueprint $table) {

            $table->id();

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id', 'fiche_ce_user_fk')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->unsignedBigInteger('client_contractuel_id');
            $table->foreign('client_contractuel_id', 'fiche_ce_client_fk')
                ->references('id')
                ->on('clients_contractuels')
                ->onDelete('cascade');

            $table->date('date');
            $table->string('direction');
            $table->string('service');
            $table->date('date_service');
            $table->time('heure');
            $table->text('motif_demandeur');
            $table->text('intervenants');
            $table->text('compte_rendu_intervention');
            $table->text('observation_agent');
            $table->text('observation_service');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('fiches_interventions_clients_entreprises');
    }
};
