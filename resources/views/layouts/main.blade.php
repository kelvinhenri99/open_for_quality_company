<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD - @yield('title')</title>
    <link rel="stylesheet" href="../../style/home.css">
    <link rel="stylesheet" href="../../style/loginOrRegister.css">
    <link rel="stylesheet" href="../../style/system.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Signika+Negative&display=swap" rel="stylesheet">
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="../../js/jquery-2.1.3.js" rel="text/javascript"></script>
    <script src="../../js/jquery-3.5.1.min.js" rel="text/javascript"></script>
    <script type="text/javascript">
        var teste = $.noConflict(true);
    </script>
</head>
<body>
    @auth
        <div class="mt-4 nav justify-content-center">
            <ul class="nav nav-tabs">
                <li class="nav-item p-2">
                    <a class="nav-link" href="/"><ion-icon name="home-outline"></ion-icon> Início</a>
                </li>
                <li class="nav-item dropdown p-2">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><ion-icon name="people-outline"></ion-icon> Funcionários</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="/employee/create"><ion-icon name="create-outline"></ion-icon> Cadastrar</a>
                        <a class="dropdown-item" href="/employee/all"><ion-icon name="search-outline"></ion-icon> Pesquisar</a>
                    </div>
                </li>
                <li class="nav-item dropdown p-2">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><ion-icon name="person-circle-outline"></ion-icon> Clientes</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="/client/create"><ion-icon name="create-outline"></ion-icon> Cadastrar</a>
                        <a class="dropdown-item" href="/client/all"><ion-icon name="search-outline"></ion-icon> Pesquisar</a>
                    </div>
                </li>
                <li class="nav-item dropdown p-2">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><ion-icon name="settings-outline"></ion-icon> Conta</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="/user/profile"><ion-icon name="at-outline"></ion-icon> Editar dados</a>
                        <div class="dropdown-divider"></div>
                        <form method="POST" action="{{ route('logout') }}">
                        @csrf
                            <a class="dropdown-item text-danger" href="{{ route('logout') }}" onclick="event.preventDefault();this.closest('form').submit();"><ion-icon name="log-out-outline"></ion-icon> Sair</a>
                    </form>
                    </div>
                </li>
            </ul>
        </div>
    @endauth
    @yield('content')
    <footer>
        <h1>All rights reserved (2023)</h1>
    </footer>

<script src="../../js/jquery.mask.js" rel="text/javascript"></script>
<script src="../../js/mask.js" rel="text/javascript"></script>
<script src="../../js/cep.js" rel="text/javascript"></script>
</body>
</html>