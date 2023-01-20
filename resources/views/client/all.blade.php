@extends('layouts.main')
@section('title', 'Pesquisar clientes')
 

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
<div class="w-75 m-auto" id="myTabContent" role="tabpanel">
    <h1 class="titleAll">Pesquisar cliente</h1>
    <form action="/client/all" method="GET">
        <div class="form-row">
            <div class="col">
                <input type="text" class="form-control" placeholder="Código" id="search_code" name="search_code">
            </div>
            <div class="col">
                <input type="text" class="form-control" placeholder="Nome" id="search_name" name="search_name">
            </div>
            <div class="col">
                <input type="text" class="form-control" placeholder="Cidade" id="search_city" name="search_city">
            </div>
            <div class="col">
                <input type="text" class="form-control" placeholder="CEP" id="search_cep" name="search_cep">
            </div>
        </div>
        <button type="submit" class="btn btn-primary w-100 mt-3 mb-5 p-2">Aplicar filtro</button>
    </form>
    <table class="table table-bordered table-hover m-auto">
            <thead>
                <tr>
                    <th scope="col" class="text-center">Código</th>
                    <th scope="col" class="text-center">Nome</th>
                    <th scope="col" class="text-center">Cidade</th>
                    <th scope="col" class="text-center">CEP</th>
                    <th scope="col" class="text-center" style="width: 120px;">Visualizar/editar</th>
                    <th scope="col" class="text-center" style="width: 120px;">Excluir</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($clients as $client)
                    <tr>
                        <td class="text-center align-middle">{{$client->code}}</th>
                        <td class="text-center align-middle">{{$client->name}}</td>
                        <td class="text-center align-middle">{{$client->city}}</td>
                        <td class="text-center align-middle">{{$client->cep}}</td>
                        <td class="text-center align-middle">
                            <button onclick="location.href='/client/edit/{{$client->user_id}}'" class="btn btn-success"><ion-icon name="create-outline"></ion-icon></button>
                        </td>
                        <td class="text-center align-middle">
                            @if (Auth::user()->type_user === 'Assistente')
                                Sem permissão
                            @else
                                <form action="/client/delete/{{$client->user_id}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"><ion-icon name="trash-outline"></ion-icon></button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mt-4 text-center">
            @if ($clients->count() === 1)
                {{ $clients->count() }} item listado
            @else
                {{ $clients->count() }} itens listados
            @endif
        </div>
        <div class="mt-2 text-center">
            {{ $clients->links() }}
        </div>
</div>
@endsection