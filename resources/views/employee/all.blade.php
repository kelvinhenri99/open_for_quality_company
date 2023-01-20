@extends('layouts.main')
@section('title', 'Pesquisar funcionários')
 

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
    <h1 class="titleAll">Pesquisar funcionário</h1>
        <form action="/employee/all" method="GET">
            <div class="form-row">
                <div class="col">
                    <input type="text" class="form-control" placeholder="Nome" id="search_name" name="search_name">
                </div>
                <div class="col">
                    <input type="text" class="form-control" placeholder="Email" id="search_email" name="search_email">
                </div>
                <div class="col">
                    <select class="form-control" id="search_type_user" name="search_type_user">
                        <option selected value="">Selecione o cargo</option>
                        <option value="Administrador">Administrador</option>
                        <option value="Assistente">Assistente</option>
                        <option value="Coordenador">Coordenador</option>
                    </select>
                </div>
            </div>
            <button type="submit" class="btn btn-primary w-100 mt-3 mb-5 p-2">Aplicar filtro</button>
        </form>
        <table class="table table-bordered table-hover m-auto">
            <thead>
                <tr>
                    <th scope="col" class="text-center">Nome</th>
                    <th scope="col" class="text-center">Email</th>
                    <th scope="col" class="text-center">Cargo</th>
                    <th scope="col" class="text-center" style="width: 120px;">Visualizar/editar</th>
                    <th scope="col" class="text-center" style="width: 120px;">Excluir</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td class="text-center align-middle">{{$user->name}}</th>
                        <td class="text-center align-middle">{{$user->email}}</td>
                        <td class="text-center align-middle">{{$user->type_user}}</td>
                        <td class="text-center align-middle">
                            @if (Auth::user()->type_user === 'Administrador')
                                <button onclick="location.href='/employee/edit/{{$user->id}}'" class="btn btn-success"><ion-icon name="create-outline"></ion-icon></button>
                            @else
                                Sem permissão
                            @endif
                        </td>
                        <td class="text-center align-middle">
                            @if (Auth::user()->type_user === 'Administrador')
                                <form action="/employee/delete/{{$user->id}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"><ion-icon name="trash-outline"></ion-icon></button>
                                </form>
                            @else
                                Sem permissão
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mt-4 text-center">
            @if ($users->count() === 1)
                {{ $users->count() }} item listado
            @else
                {{ $users->count() }} itens listados
            @endif
        </div>
        <div class="mt-2 text-center">
            {{ $users->links() }}
        </div>
    </div>
@endsection