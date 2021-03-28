@component('layouts.app')
@section('title', 'Cadastrar um veículo')
@section('content')
    <h1>Cadastrar um novo veículo</h1>
    @slot('header')
    @endslot
    @if(count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{Form::open(['route' => 'veiculos.store', 'class'=> 'form-group row p-5 bootstrap-iso'])}}

    {{Form::label('marca', 'Marca')}}
    {{Form::text('marca', '', ['class' => 'form-control', 'required', 'placeholder' => 'Marca'])}}

    {{Form::label('modelo', 'Modelo')}}
    {{Form::text('modelo', '', ['class' => 'form-control', 'required', 'placeholder' => 'Modelo'])}}

    {{Form::label('versao', 'Versão')}}
    {{Form::text('versao', '', ['class' => 'form-control', 'required', 'placeholder' => 'Versão'])}}

    <div class="form-check p-2">
        {{Form::label('manutencao', 'Manutenção', ['class' => 'form-check-label'])}}
        {{Form::checkbox('manutencao', 1, ['class' => 'form-check-input', 'type'=>'checkbox', 'id'=>'flexCheckDefault', 'required', 'placeholder' => 'Manutenção'])}}
        <!-- Special version of Bootstrap that only affects content wrapped in .bootstrap-iso -->
            <link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" />

            <!--Font Awesome (added because you use icons in your prepend/append)-->
            <link rel="stylesheet" href="https://formden.com/static/cdn/font-awesome/4.4.0/css/font-awesome.min.css" />

            <!-- Inline CSS based on choices in "Settings" tab -->
            <style>.bootstrap-iso .formden_header h2, .bootstrap-iso .formden_header p, .bootstrap-iso form{font-family: Arial, Helvetica, sans-serif; color: black}.bootstrap-iso form button, .bootstrap-iso form button:hover{color: white !important;} .asteriskField{color: red;}</style>

            <!-- HTML Form (wrapped in a .bootstrap-iso div) -->

                                <div class="form-group ">
                                    <label class="control-label " for="data">
                                        Data da manutenção
                                    </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar">
                                            </i>
                                        </div>
                                        <input class="form-control" id="data" name="data" placeholder="DD/MM/AAAA" type="text"/>
                                    </div>
                                </div>


            <!-- Extra JavaScript/CSS added manually in "Settings" tab -->
            <!-- Include jQuery -->
            <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

            <!-- Include Date Range Picker -->
            <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>

            <script>
                $(document).ready(function(){
                    var date_input=$('input[name="data"]'); //our date input has the name "date"
                    var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
                    date_input.datepicker({
                        format: 'yyyy-mm-dd',
                        container: container,
                        todayHighlight: true,
                        autoclose: true,
                    })
                })
            </script>
    </div>


    {{Form::submit('Cadastrar', ['class'=>'btn btn-success'])}}

    {{Form::close()}}

    @endcomponent
