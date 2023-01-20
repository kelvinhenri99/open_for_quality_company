@extends('layouts.main')
@section('title', 'Editar funcionário')

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
@foreach ($user as $user)
    <div>
        <div class="tab-pane fade show active" id="employee" role="tabpanel" aria-labelledby="home-tab">
        <h1 class="titleAll">Editar funcionário X</h1>
        <div class="w-75 m-auto">
            <form action="/employee/update/{{$user->id}}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="inputEstado">Cargo</label>
                        <select id="inputEstado" class="form-control" name="type_user">
                            <option selected value="{{$user->type_user}}">{{$user->type_user}}</option>
                            <option value="Administrador">Administrador</option>
                            <option value="Assistente">Assistente</option>
                            <option value="Coordenador">Coordenador</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="name">Nome</label>
                        <input type="text" class="form-control" name="name" id="name" :value="old('name')" required placeholder="..." maxlength="100" value="{{$user->name}}">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="email">E-mail</label>
                        <input type="text" class="form-control" name="email" id="email" :value="old('email')" placeholder="..." maxlength="100" value="{{$user->email}}">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="password">Senha</label>
                        <input type="password" class="form-control" name="password" id="password" autocomplete="new-password" placeholder="..." maxlength="15" value="{{$user->password}}">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="cad">Data de cadastro</label>
                        <input type="text" class="form-control disabled" id="cad" value="{{$user->created_at->format('d/m/Y H:i:s')}}" disabled>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="aut">Data da ultima atualização</label>
                        <input type="text" class="form-control disabled" id="aut" value="{{$user->updated_at->format('d/m/Y H:i:s')}}" placeholder="Horário atual de Brasília" disabled>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary w-100 mt-4 p-2">Editar funcionário</button>
            </form>
        </div>
    </div>
@endforeach
@endsection