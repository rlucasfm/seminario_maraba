<div>
    <img src="img/logo_icm.svg" width="100%" style="margin:auto;">
    <div style="text-align: center">
        <h5>Região Sul do Pará</h5>
        <hr>
        <p><strong>{{ $inscricao->nome }}</strong></p>
        <p><strong>Igreja:</strong> {{ $inscricao->igreja }}</p>
        <img src="data:image/png;base64, {!! $inscricao->qrcode !!}" height="100px">
    </div>
</div>

{{-- 127.0.0.1:8000/cadastro/gerar/29 --}}
