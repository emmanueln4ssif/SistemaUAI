<?php

namespace App\Http\Controllers;
use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function index(Request $request)
    {
        return view('/admin.clientes.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('/admin.clientes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    
        return redirect()->route('clientes.index')->with('success', 'Cliente registrado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return view('admin.clientes.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cliente $Cliente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cliente $Cliente)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $imovel = Cliente::find($id);

        if (!$imovel = Cliente::find($id)) {
            return redirect()->route('clientes.index')->with('error', 'Cliente não encontrado.');
        }

        $imovel->delete();

        return redirect()->route('clientes.index')->with('success', 'Cliente excluído com sucesso!');
    }
}
