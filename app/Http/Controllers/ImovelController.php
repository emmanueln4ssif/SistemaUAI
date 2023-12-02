<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImovelRequest;
use App\Models\Animal;
use App\Models\Imovel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ImovelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return view('/admin.imoveis.index');
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
    
        return redirect()->route('imoveis.index')->with('success', 'Imovel agendada com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return view('admin.imoveis.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Imovel $Imovel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Imovel $Imovel)
    {
        //
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
