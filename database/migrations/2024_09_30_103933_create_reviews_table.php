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
        Schema::create('reviews', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('appointment_id'); // ID dell'appuntamento
            $table->unsignedBigInteger('service_id'); // Servizio recensito
            $table->string('customer_name'); // Nome del cliente
            $table->integer('rating'); // Valutazione (1-5 stelle)
            $table->text('comment')->nullable(); // Commento
            $table->timestamps();

            // Definizione delle chiavi esterne
            $table->foreign('appointment_id')->references('id')->on('appointments')->onDelete('cascade');
            $table->foreign('service_id')->references('id')->on('services')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
