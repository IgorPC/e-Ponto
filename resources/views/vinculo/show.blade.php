@extends('layouts.layout')

@section('titulo')
    Solicitações de vinculos
@endsection

@section('conteudo')
    <h1>Vinculos</h1>
    <hr>
    @include('mensagens.sucesso')
    <ul class="list-group">
        @foreach($vinculos as $vinculo)
            @php
                $user = \App\User::find($vinculo->user_id);
            @endphp
            <li class="list-group-item">
                <span class="float-left">{{$user->name}} - Status:
                        @if($vinculo->status == 1)<span style="color: gray; font-weight: bold">AGUARDANDO APROVAÇÃO</span>
                        @elseif($vinculo->status == 2)<span style="color: darkred; font-weight: bold">REJEITADO</span>
                        @elseif($vinculo->status == 3)<span style="color: green; font-weight: bold">APROVADO</span>
                        @elseif($vinculo->status == 4)<span style="color: purple; font-weight: bold">DESVINCULADO</span>
                        @endif
                </span>
                @if($vinculo->status == 1)
                    <a class="float-right btn btn-outline-danger btn-sm" href="{{route('admin.vinculo.rejeitar', ['id' => $vinculo->id])}}">Rejeitar</a>
                    <a class="mr-4 float-right btn btn-outline-success btn-sm" href="{{route('admin.vinculo.aceitar', ['id' => $vinculo->id])}}">Aceitar</a>
                @endif
            </li>
        @endforeach
    </ul>
@endsection
