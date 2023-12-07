<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reserva;
use App\Models\User;
use App\Models\Anuncio;
use App\Models\Perfil;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class ReservaController extends Controller
{
    public function __invoke(Request $request)
    {
        // Your controller logic goes here
    }

    public function index(Request $request)
    {
        $reservas = Reserva::latest()->paginate(5);

        if(Auth::user()->is_admin != 1){
            $reservasFeitasPorMim = Reserva::where('solicitante_id', Auth::user()->id)->latest()->paginate(5);
            $reservasEnviadasAMim = Reserva::join('anuncios', 'reservas.anuncio_id', '=', 'anuncios.id')
                ->where('anuncios.cliente_id', Auth::user()->id)
                ->latest('reservas.created_at')
                ->paginate(5);
        }

        $logado = Auth::user()->id;
       
        //if ($reservas->count() != 0) {
        //    $mensagem = 'Ainda não há reservas cadastradas no sistema...';
        //    return view('admin.reservas.index', compact('mensagem', 'reservas'));
        //}

        return view('/admin.reservas.index', compact('reservas', 'reservasEnviadasAMim', 'reservasFeitasPorMim', 'logado'));
   
    }

    public function show($id)
    {
        $reserva = Reserva::find($id);
        $user = User::find($reserva->solicitante_id);
        $perfil = Perfil::where('cliente_id', $user->id)->latest()->first();

        $dia_inicio = Carbon::parse($reserva->data_entrada)->format('d/m/Y');

        $dia_termino = Carbon::parse($reserva->data_saida)->format('d/m/Y');

        if (!$reserva) {
            return redirect()->route('reservas.index')->with('error', 'Reserva não encontrada.');
        }
    
        return view('admin.reservas.show', compact('reserva', 'user', 'perfil', 'dia_inicio', 'dia_termino'));
    }

    public function confirmarReserva($id, Request $request)
    {
        $reserva = Reserva::find($id);
        $reserva->status = $request->status;
        $reserva->save();

        return redirect()->route('reservas.index')->with('success', 'Status alterado com sucesso!');
    }

    public function solicitarReserva($id)
    {
        $anuncio = Anuncio::find($id);
        $reserva = new Reserva();
        $reserva->anuncio_id = $anuncio->id;
        $reserva->solicitante_id = Auth::user()->id;
        $reserva->data_entrada = Carbon::today();
        $reserva->data_saida = Carbon::today()->addDays(10);
        $reserva->observacao = 'Boa tarde! Entre em contato comigo para combinarmos os detalhes da reserva.';
        $reserva->status = 'pendente';
        $reserva->quantidade_quartos = 1;

        $reserva->save();

        return redirect()->route('site.inicio')->with('success', 'Reserva com sucesso!');
    }
}
