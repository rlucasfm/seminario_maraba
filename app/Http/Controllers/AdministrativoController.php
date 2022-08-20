<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inscricao;

class AdministrativoController extends Controller
{
    public function gerarPorIgrejas() {
        return view('Pages.Administrativo.igrejas', [
            'inscricoes' => []
        ]);
    }


    public function gerarCrachasMultiple() {
        $id_arr = [1,2,3,4,5,6,7,8,9,10,11,12];
        $inscricoes = Inscricao::whereIn('id', $id_arr)->get();

        return view('layouts.cracha_multiple', [
            'inscricoes' => $inscricoes
        ]);
    }
}
