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
        Schema::create('anuncios', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cliente_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('imovel_id')->constrained('imoveis')->cascadeOnDelete();
            $table->string('titulo');
            $table->string('tipo');
            $table->string('observacoes');
            $table->string('valor');
            $table->boolean('status_ativo')->default(false);
            $table->string('foto');
            $table->string('tempo_aluguel');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('anuncios');
    }
};
