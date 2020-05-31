@extends('layouts.layout')

@section('titulo')
    {{$empresa->nome}}
@endsection

@section('conteudo')
    <h1 class="titulo-interno">{{$empresa->nome}}</h1>
    <hr>
    @include('mensagens.sucesso')
    @if($empresa->user_id == auth()->user()->id)
        <div class="row">
            <div class="col-md-6">
                <a class="btn btn-outline-dark w-100 float-left mb-3" href="{{route('admin.empresa.edit', ['id' => $empresa->id])}}">Editar <i class="fas fa-edit"></i></a>
            </div>
            <div class="col-md-2">
                <a class="btn btn-outline-secondary w-100 float-right mb-3" href="{{route('admin.vinculo.show', ['id' => $empresa->id])}}">Vinculos <span class="badge badge-secondary">{{$vinculos->count()}}</span></a>
            </div>
            <div class="col-md-2">
                <a class="btn btn-outline-info w-100 float-right mb-3" href="{{route('admin.relatorio.index', ['id' => $empresa->id])}}">Relatórios <i class="far fa-file"></i></a>
            </div>
            @if($empresa->status == 1)
                <div class="col-md-2">
                    <a class="btn btn-outline-danger w-100 float-right mb-3" href="{{route('admin.empresa.destroy', ['id' => $empresa->id])}}" onclick="return confirm('Tem certeza que deseja inativar a empresa?')">Inativar <i class="fas fa-exclamation-triangle"></i></a>
                </div>
            @else
                <div class="col-md-2">
                    <a class="btn btn-outline-success w-100 float-right mb-3" href="{{route('admin.empresa.ativar', ['id' => $empresa->id])}}" onclick="return confirm('Tem certeza que deseja ativar a empresa?')">Ativar <i class="fas fa-check-circle"></i></a>
                </div>
            @endif
        </div>
    @endif
    <div class="row">
        <div class="col-md-6">
            <div class="card h-100">
                <div class="card-body">
                    <h2 class="mb-4 text-center">Dados</h2>
                    <div class="mb-4">
                        <h5 class="mb-2"><i class="far fa-envelope mr-2"></i> Email: {{$empresa->email}}</h5>
                        <h5 class="mb-2"><i class="fab fa-whatsapp mr-2"></i> Celular: {{$empresa->celular}}</h5>
                        <h5 class="mb-2"><i class="fas fa-home mr-1"></i> Endereço: {{$empresa->rua}}, {{$empresa->numero}}, {{$empresa->bairro}}, {{$empresa->cidade}} - {{$empresa->pais}}</h5>
                        <h5 class="mb-2"><i class="fas fa-user mr-2"></i> Responsavel: {{$user->name}}</h5>
                        <h5 class="mb-2"><i class="fas fa-users"></i> Quantidade de colaboradores cadastrados: {{$colaboradores->count()}}</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card h-100">
                <div class="card-body">
                    <h2 class="mb-4 text-center">Status</h2>
                    <div class="mb-4 text-center">
                        <span class="empresa-status">
                            @if($empresa->status == 1)<p class="status" style="color: green; font-weight: bold">ATIVO</p>
                            @else <p class="status" style="color: darkred; font-weight: bold">INATIVO</p>
                            @endif
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <h2 class="mt-4">Colaboradores:</h2>
    <hr>
    <div class="list-group">
        @foreach($colaboradores as $colaborador)
        <span class="list-group-item list-group-item-action">
            <span><strong>{{$colaborador->name}}</strong>
                @if($empresa->user_id == auth()->user()->id)
                    @if($colaborador->id == $empresa->user_id)
                        <span class=" float-right mt-1 badge badge-primary">Adminstrador</span>
                    @else
                        <a style="color: red" onclick="return confirm('Tem certeza que deseja desvincular o colaborador da empresa?')"
                           class="float-right" href="{{route('admin.vinculo.finalizar', ['id' => $colaborador->id])}}">
                            <i class="fas fa-times"></i>
                        </a>
                    @endif
                @endif
            </span>
        </span>
        @endforeach
    </div>
@endsection
