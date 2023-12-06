<?php

namespace App\Http\Controllers;
use App\Models\Cliente;
use App\Models\User;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class ClienteController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('search');

        $users = User::latest()->paginate(5);
       
        if ($users->count() === 0) {
            $mensagem = 'Ainda não há usuários cadastrados...';
            return view('admin.clientes.index', compact('mensagem', 'users'));
        }

        if ($query) {
            $users = User::where('name', 'like', '%' . $query . '%')->paginate(5);
        } else {
            $users = User::latest()->paginate(5);
        }

        return view('/admin.clientes.index', compact('users', 'query'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = new User();

        return view('/admin.clientes.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', Rules\Password::defaults()],
            'cpf' => 'required|cpf|formato_cpf',
        ]);

        $data = $request->all();
        $data['password'] = Hash::make($data['password']);

        User::create($data);

        return redirect()->route('clientes.index')->with('success', 'Usuário registrado com sucesso!');
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
    public function edit($id)
    {
        $user = User::find($id);

        return view('/admin.clientes.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'cpf' => 'required|cpf|formato_cpf',
        ]);

        $data = $request->all();

        $user = User::find($id);
        

        //$data['password'] = Hash::make($data['password']);

        $user->update($data);

        return redirect()->route('clientes.index')->with('success', 'Usuário editado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $cliente = User::find($id);

        if (!$cliente = User::find($id)) {
            return redirect()->route('clientes.index')->with('error', 'Usuário não encontrado.');
        }

        $cliente->delete();

        return redirect()->route('clientes.index')->with('success', 'Usuário excluído com sucesso!');
    }
}
