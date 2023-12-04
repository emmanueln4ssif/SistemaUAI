<?php

namespace App\Http\Controllers;

use App\Models\Perfil;
use Illuminate\Http\Request;

class PerfilController extends Controller
{
    public function index(Request $request)
    {
        return view('/admin.perfis.index');
    }

    public function show(Perfil $perfil)
    {
        return view('/admin.perfis.show_perfil', compact('perfil'));
    }
    
    public function create()
    {
        $perfil = new Perfil();
        $user = auth()->user();

        return view('/admin.perfis.create_perfil', compact('perfil', 'user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        
        Perfil::create($data);

        return redirect()->route('perfil.index')->with('success', 'Dados salvos com sucesso!');
    }
}
