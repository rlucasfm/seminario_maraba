@extends('layouts.app')

@section("main_content")
<div class="card">
    <div class="card-body">
        <h5 class="card-title">Inscrições cadastradas</h5>
        <div class="hr mb-4"></div>
        <table class="table table-hover">
            <thead>
                <tr>
                <th scope="col">Nome</th>
                <th scope="col">CPF</th>
                <th scope="col">Data de Nascimento</th>
                <th scope="col">Sexo</th>
                <th scope="col">Igreja</th>
                <th scope="col">Nome do Pastor</th>
                <th scope="col">Pago</th>
                <th scope="col">Check-in</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($inscricoes as $inscricao)
                <tr onclick="redirect({{ $inscricao->id }})">
                    <th scope="row">{{ $inscricao->nome }}</th>
                    <td>{{ $inscricao->cpf }}</td>
                    <td>{{ $inscricao->nascimento }}</td>
                    <td>{{ $inscricao->sexo }}</td>
                    <td>{{ $inscricao->igreja }}</td>
                    <td>{{ $inscricao->nome_pastor }}</td>
                    <td>{!! ($inscricao->pago == 1) ? '<i class="fa-solid fa-check"></i>' : '<i class="fa-solid fa-ban"></i>' !!}</td>
                    <td>{!! ($inscricao->checkin == 1) ? '<i class="fa-solid fa-check"></i>' : '<i class="fa-solid fa-ban"></i>' !!}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="container mt-2">
            {{ $inscricoes->links() }}
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    function redirect(id) {
        window.location.href = 'checkin/' + id
    }
</script>
@endsection
