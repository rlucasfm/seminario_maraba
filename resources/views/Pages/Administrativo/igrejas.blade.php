@extends('layouts.app')

@section("main_content")
<div class="card">
    <div class="card-body">
        <h5 class="card-title">Selecionar Igreja para emissão de Crachá</h5>
        <form method="POST" action="{{ route('web.admin.cracha_multiple') }}">
            @csrf
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="igreja">Igreja</label>
                    <select id="igreja" name="igreja" class="form-control">
                        <option>Dom Eliseu</option>
                        <option>Centro</option>
                    </select>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Imprimir crachás</button>
        </form>
    </div>
</div>
@endsection
