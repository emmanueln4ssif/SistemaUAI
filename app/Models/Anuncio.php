<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Anuncio extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'tipo',
        'observacoes',
        'valor',
        'status_ativo',
        'foto',
        'tempo_aluguel',
        'cliente_id',
        'imovel_id'
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }
   
    public function imovel(): HasOne
    {
        return $this->hasOne(Imovel::class);
    }

    public function reservas(): HasMany
    {
        return $this->hasMany(Reserva::class);
    }

    public function avaliacoes(): HasMany
    {
        return $this->hasMany(Avaliacao::class);
    }

}