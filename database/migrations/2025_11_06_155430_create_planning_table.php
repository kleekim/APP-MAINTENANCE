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
        Schema::create('plannings', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id', 'planning_user_fk')
                ->references('id')->on('users')->onDelete('cascade');

            $table->unsignedBigInteger('client_contractuel_id');
            $table->foreign('client_contractuel_id', 'planning_client_fk')
                ->references('id')->on('clients_contractuels')->onDelete('cascade');

            $table->string('mois_debut'); 
            $table->string('mois_fin');

         
            $table->date('date');
            $table->text('activite');       
            $table->time('heure');
            $table->string('equipe');
            $table->text('observation');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plannings');
    }
};


