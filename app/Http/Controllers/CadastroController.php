<?php

namespace App\Http\Controllers;

use App\Models\Inscricao;
use Illuminate\Http\Request;
use PDF;
class CadastroController extends Controller
{
    protected $checkin_enum = [
        'Entrada - Sábado',
        'Café - Sábado',
        'Almoço - Sábado',
        'Lanche - Sábado',
        'Entrada - Domingo',
        'Café - Domingo',
    ];

    public function index() {
        $inscricoes = Inscricao::all();

        return view('Pages.Cadastro.main', [
            'inscricoes' => $inscricoes,
            'checkin_enum' => $this->checkin_enum
        ]);
    }

    public function checkin() {
        $inscricoes = Inscricao::paginate(5);

        return view('Pages.Cadastro.checkin', [
            'inscricoes' => $inscricoes
        ]);
    }

    public function form_cadastrar(Request $request) {
        try {
            $dados = $request->all();

            if(isset($dados['id'])) {
                Inscricao::find($dados['id'])->update([
                    'nome' => $dados['nome'],
                    'cpf' => $dados['cpf'],
                    'nascimento' => $dados['nascimento'],
                    'sexo' => $dados['sexo'],
                    'igreja' => $dados['igreja'],
                    'nome_pastor' => $dados['pastor'],
                    'pago' => isset($dados['pago']) ? 1 : 0,
                    'checkin' => isset($dados['checkin']) ? $dados['checkin'] : ''
                ]);

                return redirect()->route('web.cadastro.checkin.edit', ['id'=>$dados['id']])->with('success', 'Inscrição atualizada com sucesso');
            } else {
                Inscricao::create([
                    'nome' => $dados['nome'],
                    'cpf' => $dados['cpf'],
                    'nascimento' => $dados['nascimento'],
                    'sexo' => $dados['sexo'],
                    'igreja' => $dados['igreja'],
                    'nome_pastor' => $dados['pastor'],
                    'pago' => isset($dados['pago']) ? 1 : 0,
                    'checkin' => isset($dados['checkin']) ? $dados['checkin'] : ''
                ]);

                return redirect()->route('web.cadastro.index')->with('success', 'Inscrição criada com sucesso');
            }


        } catch (\Exception $th) {
            return back()->withInput()->with('error', 'Houve um erro ao inscrever/atualizar');
        }
    }

    public function editInscricao($id) {
        $inscricao = Inscricao::find($id);

        return view('Pages.Cadastro.edit', [
            'inscricao' => $inscricao,
            'checkin_enum' => $this->checkin_enum
        ]);
    }

    public function gerarCracha($id) {
        $inscricao = Inscricao::find($id);

        return PDF::loadView('layouts.cracha_pdf', compact('inscricao'))->setPaper('a7', 'portrait')
        // Se quiser que fique no formato a4 retrato: ->setPaper('a4', 'landscape')
        ->download('cracha-' . str_replace(' ', '', $inscricao->nome) . '-' . $inscricao->id . '-.pdf');
    }
}
