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
        Schema::create('appointments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('customer_name'); // Nome del cliente
            $table->string('customer_phone'); // Numero di telefono
            $table->string('customer_email')->nullable(); // Email (opzionale)
            $table->timestamp('appointment_time'); // Data e ora della prenotazione
            $table->enum('status', ['pending', 'confirmed', 'completed', 'cancelled']); // Stato
            $table->timestamps();
        });


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
