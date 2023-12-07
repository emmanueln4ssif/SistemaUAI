<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anuncio;
use App\Models\Imovel;

class PublicController extends Controller
{
    public function index($id)
    {
        $anuncio = Anuncio::find($id);
        $imovel = Imovel::find($anuncio->imovel_id);
        $valor_m2 = $this->calculaM2($imovel->tamanho, $anuncio->valor);

        return view('site.anuncio_ind', compact('anuncio', 'valor_m2', 'imovel'));
    }

    public function calculaM2($area, $valor)
    {
        $valor_m2 = $valor / $area;
        return $valor_m2;
    }
}
