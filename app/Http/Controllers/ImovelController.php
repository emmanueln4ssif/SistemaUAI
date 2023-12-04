<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImovelRequest;
use App\Models\Cliente;
use App\Models\Imovel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

class ImovelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $imoveis = Imovel::where('cliente_id', Auth::id())->get();
        return view('/admin.imoveis.index', compact('imoveis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('/admin.imoveis.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $regras = [
            'tipo' => 'required|string',
            'endereco' => 'required|string',
            'bairro' => 'required|string',
            'cidade' => 'required|string',
            'estado' => 'required|string',
            'cep' => 'required|string',
            'tamanho' => 'required|numeric', 
            'quantidade_quartos' => 'required|integer', 
            'fotos.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10', 
        ];


        $imovel = Imovel::create([
            'tipo' => $request->input('tipo'),
            'endereco' => $request->input('endereco'),
            'bairro' => $request->input('bairro'),
            'cidade' => $request->input('cidade'),
            'estado' => $request->input('estado'),
            'cep' => $request->input('CEP'),
            'tamanho' => $request->input('tamanho'),
            'quantidade_quartos' => $request->input('quant_quartos'),
            'cliente_id' => Auth::id(), 
        ]);

        
        if ($request->hasFile('fotos')) {
            foreach ($request->file('fotos') as $foto) {
                $path = $foto->store('imovel_fotos', 'public');
                $imovel->fotos()->create(['caminho' => $path]);
            }
        }
        return redirect()->route('imoveis.show', compact('imovel'))->with('success', 'Imovel cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $imovel = Imovel::findOrFail($id);
        return view('admin.imoveis.show', compact('imovel'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Imovel $imovel)
    {
        return view('admin.imoveis.edit', compact('imovel'));
    }

    /**
     * Update the specified resource in storage.
     */

     public function update(Request $request, Imovel $imovel)
     {
         try {
             $request->validate([
                 'tipo' => 'required|string',
                 'endereco' => 'required|string',
                 'bairro' => 'required|string',
                 'cidade' => 'required|string',
                 'estado' => 'required|string',
                 'cep' => 'required|string',
                 'tamanho' => 'required|numeric', 
                 'quant_quartos' => 'required|integer', 
                 'fotos.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10'
             ]);
             
             $imovel->update([
                 'tipo' => $request->input('tipo'),
                 'endereco' => $request->input('endereco'),
                 'bairro' => $request->input('bairro'),
                 'cidade' => $request->input('cidade'),
                 'estado' => $request->input('estado'),
                 'cep' => $request->input('cep'),
                 'tamanho' => $request->input('tamanho'),
                 'quantidade_quartos' => $request->input('quant_quartos'),
                 'cliente_id' => Auth::id(),
             ]);

             
     
            if ($request->hasFile('fotos')) {
                foreach ($request->file('fotos') as $foto) {
                    $path = $foto->store('imovel_fotos', 'public');
                    $imovel->fotos()->create(['caminho' => $path]);
                }
    
            }
     
            return redirect()->route('imoveis.show', $imovel->id)->with('success', 'Imovel atualizado com sucesso!');
         } 
         catch (\Exception $e) {
            return redirect()->route('imoveis.show', $imovel->id)->with('error', 'Erro ao atualizar imovel.');
         }
     }
     

     


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $imovel = Imovel::find($id);

        if (!$imovel = Imovel::find($id)) {
            return redirect()->route('imoveis.index')->with('error', 'Imovel não encontrado.');
        }

        $imovel->delete();

        return redirect()->route('imoveis.index')->with('success', 'Imovel excluído com sucesso!');
    }
}
