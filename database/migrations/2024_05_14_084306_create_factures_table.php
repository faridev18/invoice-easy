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
        Schema::create('factures', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Replaced client_id with user_id
            $table->date('date_facture');
            $table->date('date_echeance');
            $table->string('objet');
            $table->double('montant_ht');
            $table->double('taux_tva');
            $table->double('montant_ttc');
            $table->string('etat_paiement');
            $table->string('mode_paiement');
            $table->text('note')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('factures');
    }
};
