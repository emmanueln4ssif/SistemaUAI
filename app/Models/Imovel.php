<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imovel extends Model
{
    use HasFactory;
    protected $table = 'imoveis';
    protected $fillable = [
        'tipo',
        'endereco',
        'bairro',
        'cidade',
        'estado',
        'cep',
        'quantidade_quartos',
        'tamanho',
        'cliente_id'
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function anuncios()
    {
        return $this->hasMany(Anuncio::class);
    }

}
