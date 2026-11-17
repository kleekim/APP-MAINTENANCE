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
        Schema::create('clients_contractuels', function (Blueprint $table) {

            $table->id();

            $table->string('client');

            $table->string('telephone');

            $table->string('email')->nullable();

            $table->string('adresse');

            $table->string('type_contrats');

            $table->integer('interventions_par_mois')->default(1);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients_contractuels');
    }
};
