<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('evaluation_eleves', function (Blueprint $table) {
            $table->id();
            $table->foreignId('evaluation_id')->constrained()->onDelete('cascade'); // Relation avec Evaluation
            $table->foreignId('eleve_id')->constrained()->onDelete('cascade'); // Relation avec Eleve
            $table->decimal('note', 5, 2); // Note de l'élève
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evaluation_eleves');
    }
};
