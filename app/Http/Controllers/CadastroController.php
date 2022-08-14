<?php

namespace App\Http\Controllers;

use App\Models\Inscricao;
use Illuminate\Http\Request;

class CadastroController extends Controller
{
    public function index() {
        $inscricoes = Inscricao::all();

        return view('Pages.Cadastro.main', [
            'inscricoes' => $inscricoes
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
                    'checkin' => isset($dados['checkin']) ? 1 : 0,
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
                    'checkin' => isset($dados['checkin']) ? 1 : 0,
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
            'inscricao' => $inscricao
        ]);
    }
}
