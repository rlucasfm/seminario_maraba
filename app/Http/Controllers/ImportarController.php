<?php

namespace App\Http\Controllers;

use App\Models\Inscricao;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\IOFactory;

class ImportarController extends Controller
{
    public function index() {
        return view('Pages.Importacao.index');
    }

    public function importar_planilha(Request $request) {
        if($request->hasFile('planilha_file')) {
            $spreadsheet = IOFactory::load($request->file('planilha_file'));
            $tab_arr = $spreadsheet->getActiveSheet()->toArray();
            unset($tab_arr[0]);

            $cadastrados = 0;
            $errors = [];
            foreach($tab_arr as $reg) {
                try {
                    if(Inscricao::where('cpf', $reg[2])->count() < 1) {
                        Inscricao::create([
                            'nome'          => $reg[0],
                            'sexo'          => $reg[1],
                            'cpf'           => $reg[2],
                            'nascimento'    => $reg[3],
                            'igreja'        => $reg[4],
                            'nome_pastor'   => $reg[5],
                            'pago'          => $reg[6] == 'X' ? 1 : 0,
                            'checkin'       => '',
                        ]);
                        $cadastrados++;
                    }
                } catch (\Exception $th) {
                    $errors[] = $th->getMessage();
                }
            }
        } else {
            return back()->with('error', 'Nenhuma planilha foi carregada');
        }

        return back()->with('success', 'Planilha importada com sucesso - ' . $cadastrados . ' registros adicionados');
    }
}
