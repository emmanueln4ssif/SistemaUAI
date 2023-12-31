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
        $Anuncio = Anuncio::where('cliente_id', Auth::id())->get();
        return view('/admin.anuncios.index', compact('Anuncio'));
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
        if($request->hasFile('foto') && $request->file('foto')->isValid()){
            $requestImage = $request->foto;
            $extension = $requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;
            $requestImage->move(public_path('img/anuncios'), $imageName);
            $data['foto'] = $imageName;
        } else if(empty($request->foto)) {
            $data['foto'] = 'semFoto';
        }

        $data = $request->all();
        //$data['foto'] = $imageName;
        $data['cliente_id'] = auth()->user()->id;
        
        Anuncio::create($data);  
            
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
    public function update(Request $request, $id)
    {
        
        $anuncio = Anuncio::find($id);

        $data = $request->all();

        $anuncio->update($data);

        return redirect()->route('anuncios.show', $anuncio->id)->with('success', 'Anúncio atualizado com sucesso!');
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