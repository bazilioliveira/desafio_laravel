@component('layouts.app')
@section('title', $veiculo->modelo)
@section('content')

    <h1>Veículo {{$veiculo->modelo}}</h1>

    <ul>
        <li>Marca: {{$veiculo->marca}}</li>
        <li>Modelo: {{$veiculo->modelo}}</li>
        <li>Versão: {{$veiculo->versao}}</li>
        <li>Adicionado em: {{$veiculo->created_at}}</li>

    </ul>
    <button onclick="window.history.go(-1);">Voltar</button>
@endcomponent
