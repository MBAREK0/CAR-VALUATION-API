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
        schema::create('voitures', function (Blueprint $table) {
            $table->id();
            $table->string('marque')->nullable();
            $table->string('modele')->nullable();
            $table->integer('annee')->nullable();
            $table->integer('kilometrage')->nullable();
            $table->decimal('prix', 10, 2)->nullable();
            $table->integer('puissance')->nullable();
            $table->string('motorisation')->nullable();
            $table->string('carburant')->nullable();
            $table->text('options')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('voitures');
    }
};
