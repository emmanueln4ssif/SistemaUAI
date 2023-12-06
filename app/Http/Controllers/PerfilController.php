<?php

namespace App\Http\Controllers;

use App\Models\Perfil;
use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use LaravelLegends\PtBrValidator\Rules\TelefoneComDdd;
use LaravelLegends\PtBrValidator\Rules\Uf;
use LaravelLegends\PtBrValidator\Rules\FormatoCep;

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

        return view('profile.edit', compact('perfil', 'user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'username' => ['required', 'string', 'max:255'],
            'ocupacao'=> ['required', 'string', 'max:255'],
            'descricao_pessoal'=> ['required', 'string', 'max:255'],
            'telefone' => 'required|telefone_com_ddd',
            'endereco'=> ['required', 'string', 'max:255'],
            'cidade'=> ['required', 'string', 'max:255'],
            'estado'=> 'required|uf',
            'cep'=> 'required|formato_cep',
        ]);

        $data = $request->all();
        $data['avaliacoes'] = null;
        $data['cliente_id'] = auth()->user()->id;

        Perfil::create($data);

        return redirect()->route('perfil.create')->with('success', 'Perfil registrado com sucesso!');
    }
}
