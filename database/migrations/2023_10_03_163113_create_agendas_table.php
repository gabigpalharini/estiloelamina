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
        Schema::create('agenda', function (Blueprint $table) {
            $table->bigInteger('cliente_id',)->nullable(true);
            $table->bigInteger('profissional_id',)->nullable(false);
            $table->date('data_hora',)->nullable(false);
            $table->bigInteger('serviço_id', )->nullable(true);
            $table->string('tipo_pagamento',20,3 )->nullable(false);
            $table->decimal('valor',)->nullable(false);
        
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agendas');
    }
};
