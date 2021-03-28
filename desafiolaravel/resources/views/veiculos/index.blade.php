@component('layouts.app')
    @section('title', 'Seus veículos')
    @section('content')

    @slot('header')
        <h1>Meus veículos</h1>

    @if(\Illuminate\Support\Facades\Session::has("mensagem"))
        <div class="alert alert-success">
            {{\Illuminate\Support\Facades\Session::get('mensagem')}}
        </div>
        @endif
    <div class="row p-5">

        @foreach($veiculos as $veiculo)
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="{{ asset('img/car.png') }}" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">{{$veiculo->marca}}</h5>
                    <p class="card-text">{{$veiculo->modelo}} - {{$veiculo->versao}}.0</p>
                    <p class="card-text">Próxima manutenção: {{$veiculo->data_manutencao}}</p>

                    {{Form::open(['route'=>['veiculos.destroy', $veiculo->id], 'method'=>'DELETE'])}}
                    <a href="{{url('veiculos/'.$veiculo->id.'/edit')}}" class="btn btn-primary">Editar</a>
                    {{Form::submit('Excluir', ['class' => 'btn btn-primary', 'onclick' => "confirm('Deseja realmente excluir este veículo?')"])}}
                    {{Form::close()}}
                </div>
            </div>
        @endforeach
    </div>

    @endcomponent
