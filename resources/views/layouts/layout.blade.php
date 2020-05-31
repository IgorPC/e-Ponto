<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('titulo')</title>
    <!--fonts-->
    <link href="https://fonts.googleapis.com/css2?family=Oxygen+Mono&family=Pacifico&family=Source+Sans+Pro&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/35505cabf9.js" crossorigin="anonymous"></script>
    <!--Styles -->
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light menu mb-4">
    @auth() <a href="{{route('admin.home')}}" class="navbar-brand"><span class="titulo">e-Ponto</span></a> @endauth
    @guest() <a href="/" class="navbar-brand"><span class="titulo">e-Ponto</span></a> @endguest
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    @auth()
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <button type="button" class="btn btn-dark btn-sm mt-1" data-toggle="modal" data-target="#modalPonto">
                        Registrar ponto
                    </button>
                </li>
                <li class="nav-item dropdown ml-2">
                    <a class="nav-link @if(auth()->user()->verify_data == 0) disabled @endif dropdown " href="#" id="navbarDropdown" data-toggle="dropdown">
                        <span class="menu-options">Empresa</span>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item text-center" @if(is_null(auth()->user()->empresa_id)) href="{{route('admin.empresa.create')}}">Cadastrar Empresa
                                                                                                                    @else href="{{route('admin.empresa.index')}}">Minha Empresa
                                                                                                                    @endif
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item text-center @if(auth()->user()->verify_data == 0 || auth()->user()->empresa_id != null) disabled @endif" href="{{route('admin.vinculo.index')}}">Vincular Empresa</a>
                    </div>
                </li>
                <li class="nav-item ml-2">
                    <a class="nav-link dropdown @if(auth()->user()->verify_data == 0) disabled @endif " href="{{route('admin.ponto.index', ['id' => auth()->user()->id])}}"><span class="menu-options">Meu Histórico</span></a>
                </li>
            </ul>
            @auth()
                <button type="button" class="btn btn-secondary mr-4" data-toggle="modal" data-target="#ModalUser">
                    <i class="far fa-user"></i> {{auth()->user()->name}}
                </button>
            @endauth
            <form class="form-inline my-2 my-lg-0" method="POST" action="{{ route('logout')}}">
                @csrf
                <button class="btn btn-danger my-2 my-sm-0" type="submit">Sair</button>
            </form>
            @endauth
            @guest()
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Entrar') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Registrar') }}</a>
                        </li>
                    </ul>
                </div>
            @endguest
        </div>
</nav>
<div class="container mb-4">
    @yield('conteudo')
</div>
@auth
    <!-- MODAL SOBRE -->
    <div class="modal fade" id="ModalUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Dados do usuario</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <ul class="list-group list-group-flush">
                        <p class="text-center"
                           style="
                                    @if(@auth()->user()->status == 0) color: red;
                                    @else color: green;
                                    @endif
                               ">
                            @if(@auth()->user()->status == 0) INATIVO
                            @else ATIVO
                            @endif
                        </p>
                        <li class="list-group-item"><strong>Nome: </strong><span class="float-right">{{auth()->user()->name}}</span></li>
                        <li class="list-group-item"><strong>Email: </strong><span class="float-right">{{auth()->user()->email}}</span></li>
                        @if(auth()->user()->verify_data == 0)
                            <div class="alert alert-secondary" role="alert">
                                <h4 class="alert-heading text-center">Você precisa atualizar seus dados!</h4>
                                <p class="text-center">Para prosseguir utilizando o sistema você precisa atualizar seus dados pessoais.</p>
                                <hr>
                                <p class="mb-0 text-center"><a class="links" href="{{route('admin.user.edit', ['id' => auth()->user()->id])}}">Clique aqui para atualizar os dados <i class="fas fa-users-cog"></i></a></p>
                            </div>
                        @else
                            <li class="list-group-item"><strong>Celular: </strong><span class="float-right">{{auth()->user()->celular}}</span></li>
                            <li class="list-group-item"><strong>Endereço: </strong><span class="float-right">
                                {{auth()->user()->rua}}, {{auth()->user()->numero}}, {{auth()->user()->bairro}}, {{auth()->user()->cidade}} - {{auth()->user()->pais}}
                            </span>
                            </li>
                            <a class="btn btn-outline-dark mt-2" href="{{route('admin.user.edit', ['id' => auth()->user()->id])}}"><i class="fas fa-user-edit w-100 h-50"></i></a>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endauth
@auth()
    @if(auth()->user()->empresa_id > 0)
        @include('layouts.modal-registrar-ponto')
    @endif
@endauth
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>
