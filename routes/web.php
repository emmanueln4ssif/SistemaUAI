<?php

use App\Http\Controllers\AnuncioController;
use App\Http\Controllers\MensagemSuporteController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ImovelController;
use App\Http\Controllers\AdministradorController;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\AvaliacaoController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//rotas públicas do site

Route::get('/', function () {
    return view('site.inicio');
});



//rotas privadas, referentes a conta do usuario

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //prefixo conta, tudo que estiver aqui deve ser antecedido de /conta
    Route::prefix('conta')->group(function () {

        //prefixo clientes, tudo que estiver aqui deve ser antecedido de /conta/usuario
        Route::prefix('usuario')->group(function () {
            Route::get('', [ClienteController::class, 'index'])->name('clientes.index');
            Route::get('/create', [ClienteController::class, 'create'])->name('clientes.create');
            Route::get('/{cliente}/edit', [ClienteController::class, 'edit'])->name('clientes.edit');
            Route::get('/{cliente}', [ClienteController::class, 'show'])->name('clientes.show');
            Route::post('', [ClienteController::class, 'store'])->name('clientes.store');
            Route::post('/{cliente}', [ClienteController::class, 'update'])->name('clientes.update');
            Route::post('/delete/{cliente}', [ClienteController::class, 'destroy'])->name('clientes.destroy');

            Route::get('/meu_perfil', [PerfilController::class, 'create'])->name('perfil.create');
            Route::post('/meu_perfil', [PerfilController::class, 'store'])->name('perfil.store');
            Route::get('/meu_perfil/{cliente}', [PerfilController::class, 'show'])->name('perfil.show');
            Route::get('/meu_perfil/{cliente}/edit', [PerfilController::class, 'edit'])->name('perfil.edit');
        });

        Route::prefix('anuncios')->group(function () {
            Route::post('/delete/{anuncio}', [AnuncioController::class, 'destroy'])->name('anuncios.destroy');
            Route::get('', [AnuncioController::class, 'index'])->name('anuncios.index');
            Route::get('/create', [AnuncioController::class, 'create'])->name('anuncios.create');
            Route::get('/{anuncio}/edit', [AnuncioController::class, 'edit'])->name('anuncios.edit');
            Route::get('/{anuncio}', [AnuncioController::class, 'show'])->name('anuncios.show');
            Route::post('', [AnuncioController::class, 'store'])->name('anuncios.store');
            Route::post('/{anuncio}', [AnuncioController::class, 'update'])->name('anuncios.update');
            
        });

        Route::prefix('imoveis')->group(function () {
            Route::delete('/delete/{imovel}', [ImovelController::class, 'destroy'])->name('imoveis.destroy');
            Route::get('', [ImovelController::class, 'index'])->name('imoveis.index');
            Route::get('/create', [ImovelController::class, 'create'])->name('imoveis.create');
            Route::get('/{imovel}/edit', [ImovelController::class, 'edit'])->name('imoveis.edit');
            Route::get('/{imovel}', [ImovelController::class, 'show'])->name('imoveis.show');
            Route::post('', [ImovelController::class, 'store'])->name('imoveis.store');
            Route::put('/{imovel}', [ImovelController::class, 'update'])->name('imoveis.update');

            


        });
        
        Route::prefix('reservas')->group(function () {
            Route::get('', [ReservaController::class, 'index'])->name('reservas.index');
            Route::get('/create', [ReservaController::class, 'create'])->name('reservas.create');
            Route::get('/{reserva}/edit', [ReservaController::class, 'edit'])->name('reservas.edit');
            Route::get('/{reserva}', [ReservaController::class, 'show'])->name('reservas.show');
            Route::post('', [ReservaController::class, 'store'])->name('reservas.store');
            Route::post('/{reserva}', [ReservaController::class, 'update'])->name('reservas.update');
            Route::post('/delete/{reserva}', [ReservaController::class, 'destroy'])->name('reservas.destroy');
        });

        Route::prefix('suporte')->group(function () {
            Route::get('', [MensagemSuporteController::class, 'index'])->name('suporte.index');
            Route::get('/create', [MensagemSuporteController::class, 'create'])->name('suporte.create');
            Route::get('/{suporte}/edit', [MensagemSuporteController::class, 'edit'])->name('suporte.edit');
            Route::get('/{suporte}', [MensagemSuporteController::class, 'show'])->name('suporte.show');
            Route::post('', [MensagemSuporteController::class, 'store'])->name('suporte.store');
            Route::post('/{suporte}', [MensagemSuporteController::class, 'update'])->name('suporte.update');
            Route::post('/delete/{suporte}', [MensagemSuporteController::class, 'destroy'])->name('suporte.destroy');
        });

        Route::prefix('proprietarios')->group(function () {
            Route::get('', [ProprietarioController::class, 'index'])->name('proprietarios.index');
            Route::get('/create', [ProprietarioController::class, 'create'])->name('proprietarios.create');
            Route::get('/{proprietario}/edit', [ProprietarioController::class, 'edit'])->name('proprietarios.edit');
            Route::get('/{proprietario}', [ProprietarioController::class, 'show'])->name('proprietarios.show');
            Route::post('', [ProprietarioController::class, 'store'])->name('proprietarios.store');
            Route::post('/{proprietario}', [ProprietarioController::class, 'update'])->name('proprietarios.update');
            Route::post('/delete/{proprietario}', [ProprietarioController::class, 'destroy'])->name('proprietarios.destroy');
        });

    });

   
});

Route::prefix('area')->group(function () {
    Route::post('/create', [PerfilController::class, 'create'])->name('perfil.create');
});


require __DIR__.'/auth.php';
