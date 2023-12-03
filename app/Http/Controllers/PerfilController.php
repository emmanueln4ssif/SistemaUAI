<?php

namespace App\Http\Controllers;

use App\Models\Perfil;
use Illuminate\Http\Request;

class PerfilController extends Controller
{
    public function create()
    {
        $perfil = new Perfil();
        $user = auth()->user();

        return view('.profile.partials.update-profile-information-form', compact('perfil', 'user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        
        Perfil::create($data);

        return redirect()->route('profile.index')->with('success', 'Dados salvos com sucesso!');
    }
}
