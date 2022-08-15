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
<div class="alert alert-warning alert-dismissible fade show" role="alert">
    {{ session('error') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
@endif

<div class="card">
    <div class="card-body">
        <h5 class="card-title">Importação de Planilha</h5>
        <form action="{{ route('web.importar.load') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="planilha_file">Planilha .xlsx</label>
                <input type="file" class="form-control-file" id="planilha_file" name="planilha_file">
            </div>

            <button type="submit" class="btn btn-primary">Carregar planilha</button>
        </form>
    </div>
</div>
@endsection
