@extends('layouts.main')
@section('title', 'Editar cliente')
 

@if (\Session::has('success'))
<div class="alert alert-success text-center fixed-top" role="alert">
    {!! \Session::get('success') !!}
    <script>
        setTimeout(function() {
        $('.alert').fadeOut('fast');
        }, 3000);
    </script>
</div>
@endif

@section('content')
@foreach ($client as $client)
    <div>
        <h1 class="titleAll">Editar cliente X</h1>
        <div class="w-75 m-auto">
            <form action="/client/update/{{$client->user_id}}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="code">Código</label>
                        <input type="text" class="form-control" id="code" placeholder="..." maxlength="15" name="code" value="{{$client->code}}">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="name">Nome</label>
                        <input type="text" class="form-control" id="name" placeholder="..." maxlength="150" name="name" value="{{$client->name}}">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="cpfcnpj">CPF / CNPJ</label>
                        <input type="text" class="form-control" id="cpfcnpj" placeholder="..." name="cpf_cnpj" value="{{$client->cpf_cnpj}}">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="cep">CEP</label>
                        <input type="text" class="form-control" id="cep" placeholder="..." onblur="pesquisacep(this.value);" name="cep" value="{{$client->cep}}">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="rua">Endereço</label>
                        <input type="text" class="form-control" id="rua" placeholder="..." maxlength="120" name="street" value="{{$client->street}}">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="bairro">Bairro</label>
                        <input type="text" class="form-control" id="bairro" placeholder="..." maxlength="50" name="district" value="{{$client->district}}">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="cidade">Cidade</label>
                        <input type="text" class="form-control" id="cidade" placeholder="..." maxlength="60" name="city" value="{{$client->city}}">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="uf">Estado</label>
                        <input type="text" class="form-control" id="uf" placeholder="..." maxlength="2" name="uf" value="{{$client->uf}}">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="numero">Numero</label>
                        <input type="text" class="form-control" id="numero" placeholder="..." maxlength="150" name="number" value="{{$client->number}}">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="complemento">Complemento</label>
                        <input type="text" class="form-control" id="complemento" placeholder="..." maxlength="150" name="complement" value="{{$client->complement}}">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="fone">Telefone</label>
                        <input type="text" class="form-control" id="fone" placeholder="..." name="phone" value="{{$client->phone}}">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="limite">Limite de crédito</label>
                        <input type="number" class="form-control" id="limite" placeholder="..." name="credit_limit" value="{{$client->credit_limit}}">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="validade">Validade</label>
                        <input type="date" class="form-control" id="validade" placeholder="..." name="validity" value="{{$client->validity}}">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="cad">Data de cadastro</label>
                        <input type="text" class="form-control disabled" id="cad" value="{{$client->created_at->format('d/m/Y H:i:s')}}" disabled>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="aut">Data da ultima atualização</label>
                        <input type="text" class="form-control disabled" id="aut" value="{{$client->updated_at->format('d/m/Y H:i:s')}}" placeholder="Horário atual de Brasília" disabled>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary w-100 mt-5 p-2">Editar cliente</button>
            </form>
        </div>
    </div>
@endforeach
@endsection