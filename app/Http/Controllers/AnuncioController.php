<?php

namespace App\Http\Controllers;
use App\Models\Anuncio;
use Illuminate\Http\Request;

class AnuncioController extends Controller
{
    public function index(Request $request)
    {
        return view('/admin.anuncios.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('/admin.anuncios.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    
        return redirect()->route('anuncios.index')->with('success', 'Anuncio agendada com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return view('admin.anuncios.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Anuncio $Anuncio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Anuncio $Anuncio)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $anuncio = Anuncio::find($id);

        if (!$anuncio = Anuncio::find($id)) {
            return redirect()->route('anuncios.index')->with('error', 'Anuncio não encontrado.');
        }

        $anuncio->delete();

        return redirect()->route('anuncios.index')->with('success', 'Anuncio excluído com sucesso!');
    }
}
