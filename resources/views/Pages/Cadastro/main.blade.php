@extends('layouts.app')

@section("main_content")

@if (session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
@endif

@if (session('error'))
<div class="alert alert-error alert-dismissible fade show" role="alert">
    {{ session('error') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
@endif

<div class="card">
    <div class="card-body">
        <h5 class="card-title">Cadastrar participante</h5>
            <form method="POST" action="{{ route('web.cadastro.form_cadastrar') }}">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-8">
                        <label for="nome">Nome Completo</label>
                        <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome completo">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="cpf">CPF</label>
                        <input type="text" class="form-control" id="cpf" name="cpf" placeholder="000.000.000-00">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="nascimento">Data de Nascimento</label>
                        <input type="text" class="form-control" id="nascimento" name="nascimento" placeholder="11/03/1999">
                    </div>
                    <div class="form-group col-md-1">
                        <label for="sexo">Sexo</label>
                        <select id="sexo" name="sexo" class="form-control">
                            <option selected>M</option>
                            <option>F</option>
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="igreja">Igreja</label>
                        <input type="text" class="form-control" id="igreja" name="igreja" placeholder="Folha 28">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="pastor">Nome do Pastor</label>
                        <input type="text" class="form-control" id="pastor" name="pastor" placeholder="Nome do pastor">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group mr-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="pago" name="pago">
                            <label class="form-check-label" for="pago">
                                Pago
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="checkin" name="checkin">
                            <label class="form-check-label" for="checkin">
                                Checkin
                            </label>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Cadastrar</button>
            </form>
        <div class="container"></div>
    </div>
</div>
@endsection
