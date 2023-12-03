<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Model;

class Cliente extends User
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'password',
        'is_admin',
        'cpf',
        'anunciosFavoritos',
        'dataCadastro',
        'dataNascimento'
    ];

    public function anuncios(): HasMany
    {
        return $this->hasMany(Anuncio::class);
    }

    public function imoveis(): HasMany
    {
        return $this->hasMany(Imovel::class);
    }

    public function avaliacoes(): HasMany
    {
        return $this->hasMany(Avaliacao::class);
    }

    public function mensagensSuporte(): HasMany
    {
        return $this->hasMany(MensagemSuporte::class);
    }

    public function perfil(): HasOne
    {
        return $this->hasOne(Perfil::class);
    }

}