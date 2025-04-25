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
        Schema::create('employes', function (Blueprint $table) {
            
            $table->id();
            $table->string('matricule')->unique();
            $table->string('poste');
            $table->enum('groupeSanguin', ['A', 'B', 'AB', 'O']);
            $table->enum('rh', ['+','-']);
            $table->text('formationScolaire')->nullable();
            $table->text('formationProfessionnelle')->nullable();
            $table->text('qualificationProfessionnelle')->nullable();
            $table->enum('situationFamille', ['Célibataire', 'Marié(e)', 'Séparé(e)', 'Veuf(ve)', 'Divorcé(e)']);
            $table->enum('serviceNational', ['Accompli', 'Dispensé', 'Inapte']);
            $table->string('numSecuSocial')->nullable();
            $table->timestamps();
            $table->softDeletes();

            
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('departement_id')->constrained()->onDelete('cascade');
            $table->foreignId('secteur_id')->nullable()->constrained()->onDelete('set null');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employes');
    }
};
