{{-- @foreach ($inscricoes as $inscricao)
<div>
    <img src="img/logo_icm.svg" width="100%" style="margin:auto;">
    <div style="text-align: center">
        <h5>Região Sul do Pará</h5>
        <hr>
        <p><strong>{{ $inscricao->nome }}</strong></p>
        <p><strong>Igreja:</strong> {{ $inscricao->igreja }}</p>
        <img src="data:image/png;base64, {!! $inscricao->qrcode !!}" height="80px">
    </div>
</div>
@endforeach --}}

{{-- 127.0.0.1:8000/cadastro/gerar/29 --}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Crachás</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
</head>
<body>
    <div class="columns is-multiline">
    @foreach ($inscricoes as $inscricao)
    <div class="column is-one-third" style="border-color: black; border-width: 1px; border-style: solid; height: 1169px;">
        <img src="{{URL::asset('img/logo_icm.svg')}}" width="100%" style="margin:auto;">
        <div style="text-align: center">
            <h5>Região Sul do Pará</h5>
            <hr>
            <p><strong>{{ $inscricao->nome }}</strong></p>
            <p class="mb-4"><strong>Igreja:</strong> {{ $inscricao->igreja }}</p>
            {!! QrCode::format('svg')->size(100)->generate($url_base . '/cadastro/checkin/' . $inscricao->id) !!}
        </div>
    </div>
    @endforeach
    </div>
    <script>
        window.print();
    </script>
</body>
</html>
