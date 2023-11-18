<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'username',
        'ocupacao',
        'descricao_pessoal',
        'telefone',
        'endereco',
        'cidade',
        'estado',
        'cep',
        'avaliacoes',
        'cliente_id'
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }
}
