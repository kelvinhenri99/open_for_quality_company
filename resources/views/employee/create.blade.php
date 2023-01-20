@extends('layouts.main')
@section('title', 'Cadastrar funcionários')
 

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
<div>
    <div class="tab-pane fade show active" id="employee" role="tabpanel" aria-labelledby="home-tab">
        <h1 class="titleAll">Cadastre um novo funcionário</h1>
    @if (Auth::user()->type_user === 'Assistente')
        <div class="alert alert-danger w-50 m-auto text-center" role="alert">
            Você não tem permissão para acessar essa parte do sistema!
        </div>
    @else
        <div class="w-50 m-auto">
            <form action="{{ route('register.insertUser') }}" method="POST">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="inputEstado">Cargo</label>
                        <select id="inputEstado" class="form-control" name="type_user">
                            <option selected>Selecione</option>
                            @if (Auth::user()->type_user === 'Administrador')
                                <option value="Administrador">Administrador</option>
                            @endif
                            <option value="Assistente">Assistente</option>
                            <option value="Coordenador">Coordenador</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="name">Nome</label>
                        <input type="text" class="form-control" name="name" id="name" :value="old('name')" required placeholder="..." maxlength="100">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="email">E-mail</label>
                        <input type="text" class="form-control" name="email" id="email" :value="old('email')" placeholder="..." maxlength="100">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="password">Senha</label>
                        <input type="password" class="form-control" name="password" id="password" required autocomplete="new-password" placeholder="..." maxlength="15">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="password_confirmation">Confirme a senha</label>
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required autocomplete="new-password" placeholder="..." maxlength="15">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary w-100 mt-4 p-2">Criar novo funcionário</button>
            </form>
        </div>
    @endif
</div>
@endsection