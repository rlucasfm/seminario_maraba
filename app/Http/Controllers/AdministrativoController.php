<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inscricao;

class AdministrativoController extends Controller
{
    public function gerarPorIgrejas() {
        $igrejas = Inscricao::select('igreja')->distinct()->get();

        return view('Pages.Administrativo.igrejas', [
            'igrejas' => $igrejas,
        ]);
    }


    public function gerarCrachasMultiple(Request $request) {
        $igreja = $request['igreja'];
        $inscricoes = Inscricao::where('igreja', $igreja)->get();

        return view('layouts.cracha_multiple', [
            'inscricoes' => $inscricoes,
            'url_base' => env('APP_URL', 'http://localhost')
        ]);
    }
}
