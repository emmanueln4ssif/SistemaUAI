<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    use HasFactory;

    protected $fillable = [
        'anuncio_id',
        'cliente_id',
        'data_entrada',
        'observacao',
        'quantidade_quartos'
    ];

    public function anuncio()
    {
        return $this->belongsTo(Anuncio::class);
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
}
