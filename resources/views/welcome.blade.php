@extends('layouts.main')
@section('title', 'Home')
 

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
    <div class="divImageHome">
        <img src="../images/system/image.png" alt="imageHome">
        <h1>System developed for Quality company</h1>
    </div>

    @guest
        <div class="LoginOrRegister">
            <h1><span class="material-symbols-outlined">Entrar no sistema</span></h1>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div>
                    <ion-icon name="mail-outline"></ion-icon>
                    <input id="email" type="email" name="email" :value="old('email')" required autofocus placeholder="Inserir e-mail"/>
                    <ion-icon name="lock-closed-outline"></ion-icon>
                    <input id="password" type="password" name="password" required autocomplete="current-password" placeholder="Inserir senha"/>
                </div>    
                <label for="remember_me">
                    <input type="checkbox" id="remember_me" name="remember" />
                        {{ __('Manter-me conectado') }}
                </label>
                <input type="submit" value="Entrar">
            </form>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                Usuário ADM
            </button>
        </div>
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Usuário ADMINISTRADOR</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        E-mail: administrator@crud.com
                        <br>
                        Password: 123456789
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Entendido</button>
                    </div>
                </div>
            </div>
        </div>
    @endguest

    @auth
    <div class="w-75 m-auto">
        <div class="row">
            <div class="col-sm-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-primary">Base do sistema</h5>
                        <p class="card-text">Laravel 9, PHP 8, Padrão MVC (Model, View, Controller), Jetstream, Javascript, MySql, Boostrap v4.1.3.</p>
                        <a href="https://github.com/kelvinhenri99/open_for_quality_company/tree/project" target="_blank" class="btn btn-primary">Link do repositório</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-primary">Recursos do sistema</h5>
                        <p class="card-text">
                            Sistema inclui autenticações e autorizações de usuários.
                            <br>Cadastro de funcionários e clientes, conforme o nível do usuário(autorização).
                            <br>Procurar clientes e/ou funcionários através de filtros específicos.
                            <br>Cadastrar, visualizar, editar e excluir funcionários e clientes, conforme o nível do usuário(autorização), conta também com filtros para uma busca específica.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-primary">Usuários</h5>
                        <p class="card-text">Sistema conta com 3 tipos de usuários, sendo Administrador, Coordenador e Assistente.</p>
                        <table class="table table-bordered bg-dark text-light">
                            <tbody>
                                <tr>
                                    <th>Usuário</th>
                                    <td class="text-center">Cadastrar Usuário</td>
                                    <td class="text-center">Visualizar Usuário</td>
                                    <td class="text-center">Editar Usuário</td>
                                    <td class="text-center">Excluir Usuário</td>
                                    <td class="text-center">Cadastrar Cliente</td>
                                    <td class="text-center">Visualizar Cliente</td>
                                    <td class="text-center">Editar Cliente</td>
                                    <td class="text-center">Excluir Cliente</td>
                                </tr>
                                <tr>
                                    <th>Administrador</th>
                                    <th class="text-center bg-success text-light" style="font-size:25px;"><ion-icon name="checkmark-circle"></ion-icon></th>
                                    <th class="text-center bg-success text-light" style="font-size:25px;"><ion-icon name="checkmark-circle"></ion-icon></th>
                                    <th class="text-center bg-success text-light" style="font-size:25px;"><ion-icon name="checkmark-circle"></ion-icon></th>
                                    <th class="text-center bg-success text-light" style="font-size:25px;"><ion-icon name="checkmark-circle"></ion-icon></th>
                                    <th class="text-center bg-success text-light" style="font-size:25px;"><ion-icon name="checkmark-circle"></ion-icon></th>
                                    <th class="text-center bg-success text-light" style="font-size:25px;"><ion-icon name="checkmark-circle"></ion-icon></th>
                                    <th class="text-center bg-success text-light" style="font-size:25px;"><ion-icon name="checkmark-circle"></ion-icon></th>
                                    <th class="text-center bg-success text-light" style="font-size:25px;"><ion-icon name="checkmark-circle"></ion-icon></th>
                                </tr>
                                <tr>
                                    <th>Coordenador</th>
                                    <th class="text-center bg-success text-light" style="font-size:25px;"><ion-icon name="checkmark-circle"></ion-icon></th>
                                    <th class="text-center bg-success text-light" style="font-size:25px;"><ion-icon name="checkmark-circle"></ion-icon></th>
                                    <th class="text-center bg-danger text-light" style="font-size:25px;"><ion-icon name="close-circle"></ion-icon></th>
                                    <th class="text-center bg-danger text-light" style="font-size:25px;"><ion-icon name="close-circle"></ion-icon></th>
                                    <th class="text-center bg-success text-light" style="font-size:25px;"><ion-icon name="checkmark-circle"></ion-icon></th>
                                    <th class="text-center bg-success text-light" style="font-size:25px;"><ion-icon name="checkmark-circle"></ion-icon></th>
                                    <th class="text-center bg-success text-light" style="font-size:25px;"><ion-icon name="checkmark-circle"></ion-icon></th>
                                    <th class="text-center bg-success text-light" style="font-size:25px;"><ion-icon name="checkmark-circle"></ion-icon></th>
                                </tr>
                                <tr>
                                    <th>Assistente</th>
                                    <th class="text-center bg-danger text-light" style="font-size:25px;"><ion-icon name="close-circle"></ion-icon></th>
                                    <th class="text-center bg-success text-light" style="font-size:25px;"><ion-icon name="checkmark-circle"></ion-icon></th>
                                    <th class="text-center bg-danger text-light" style="font-size:25px;"><ion-icon name="close-circle"></ion-icon></th>
                                    <th class="text-center bg-danger text-light" style="font-size:25px;"><ion-icon name="close-circle"></ion-icon></th>
                                    <th class="text-center bg-success text-light" style="font-size:25px;"><ion-icon name="checkmark-circle"></ion-icon></th>
                                    <th class="text-center bg-success text-light" style="font-size:25px;"><ion-icon name="checkmark-circle"></ion-icon></th>
                                    <th class="text-center bg-success text-light" style="font-size:25px;"><ion-icon name="checkmark-circle"></ion-icon></th>
                                    <th class="text-center bg-danger text-light" style="font-size:25px;"><ion-icon name="close-circle"></ion-icon></th>
                                </tr>
                            </tbody>
                        </table>
                        <p class="card-text text-muted">Obs.: Usuários de tipo "Coordenador" só conseguem cadastrar usuários de tipo "Assistente" e "Coordenador", o tipo "Administrador" só o Administrador consegue criar um usuário do mesmo tipo.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endauth
@endsection