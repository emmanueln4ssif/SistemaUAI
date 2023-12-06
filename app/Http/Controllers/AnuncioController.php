<?php

namespace App\Http\Controllers;

use App\Http\Requests\AnuncioRequest;
use App\Models\Cliente;
use App\Models\Imovel;
use App\Models\Anuncio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

class AnuncioController extends Controller
{
    public function index(Request $request)
    {
        $anuncio = Anuncio::where('cliente_id', Auth::id())->get();
        return view('/admin.anuncios.index', compact('anuncio'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $anuncio = new Anuncio();
        $user = Auth::user()->id;
        $imoveis = Imovel::where("cliente_id", $user)->get();
        return view('/admin.anuncios.create', compact('anuncio'), compact('imoveis'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
        'titulo' => 'required|string',
        'tipo' => 'required|string',
        'tempo_aluguel' => 'required|int',
        'valor' => 'required|numeric',
        'observacoes' => 'required|string',
        'imovel_id' => 'required|int',]);
        
        
        $data = $request->all();
        $data['cliente_id'] = Auth::id();
        $data['foto'] = 'fotos';
        $Anuncio = Anuncio::create($data);
            
        return redirect()->route('anuncios.index')->with('success', 'Anúncio criado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $anuncio = Anuncio::findOrFail($id);
        return view('admin.anuncios.show', compact('anuncio'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Anuncio $anuncio)
    {
        return view('admin.anuncios.edit', compact('anuncio'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Anuncio $anuncio)
    {
        try {
            $request->validate([
                'titulo' => 'required|string',
                'tipo' => 'required|string',
                'tempo_aluguel' => 'required|int',
                'valor' => 'required|numeric',
                'observacoes' => 'required|string',
                'imovel_id' => 'required|int',
            ]);
            
            $anuncio->update([
                'titulo' => $request->input('titulo'),
                'tipo' => $request->input('tipo'),
                'tempo_aluguel' => $request->input('tempo_aluguel'),
                'valor' => $request->input('valor'),
                'observacoes' => $request->input('observacoes'),
                'imovel_id' => $request->input('imovel_id'),
                'cliente_id' => Auth::id(),
            ]);
            

            return redirect()->route('anuncios.show', $anuncio->id)->with('success', 'Anúncio atualizado com sucesso!');
         } 
         catch (\Exception $e) {
            return redirect()->route('anuncios.show', $anuncio->id)->with('error', 'Erro ao atualizar anúncio.');
         }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $anuncio = Anuncio::find($id);
        if (!$anuncio = Anuncio::find($id)) {
            return redirect()->route('anuncios.index')->with('error', 'Anúncio não encontrado.');
        }

        $anuncio->delete();

        return redirect()->route('anuncios.index')->with('success', 'Anúncio excluído com sucesso!');
    }
}