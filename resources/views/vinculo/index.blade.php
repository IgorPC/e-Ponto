@extends('layouts.layout')

@section('titulo')
    Vincular empresa
@endsection

@section('conteudo')
    <h1>Vincular empresa</h1>
    @php
    $userVinculos = DB::table('vinculos')
            ->whereRaw('user_id = ? and status = ?', [auth()->user()->id, 1])
            ->get();
    @endphp
    @if($userVinculos->count() == null && auth()->user()->empresa_id == null)
        <hr>
        @include('mensagens.sucesso')
        <h3>Selecione a empresa</h3>
        <form action="{{route('admin.vinculo.store')}}" method="POST">
            @csrf
            <div class="form-group mt-4">
                <label for="exampleFormControlSelect1">Empresas disponiveis: </label>
                <select class="form-control" name="empresa" id="exampleFormControlSelect1">
                    @foreach($empresas as $empresa)
                        <option value="{{$empresa->id}}" @if($empresa->status == 2) disabled @endif>{{$empresa->nome}}</option>
                    @endforeach
                </select>
            </div>
            <button class="btn btn-outline-dark" type="submit">Solicitar Vinculo</button>
        </form>
    @endif
    @if($vinculos->count() != 0)
        <h4  class="mt-4">Solicitações de Vinculos</h4>
        <hr>
        <ul class="list-group">
            @foreach($vinculos as $vinculo)
                <li class="list-group-item">
                    @php
                      $empresa = \App\Empresa::find($vinculo->empresa_id)
                    @endphp
                <span class="float-left">{{$empresa->nome}}</span>
                    <span class="float-right">
                        @if($vinculo->status == 1)<span style="color: gray; font-weight: bold">AGUARDANDO APROVAÇÃO</span>
                        @elseif($vinculo->status == 2)<span style="color: darkred; font-weight: bold">REJEITADO</span>
                        @elseif($vinculo->status == 3)<span style="color: green; font-weight: bold">APROVADO</span>
                        @elseif($vinculo->status == 4)<span style="color: purple; font-weight: bold">DESVINCULADO</span>
                        @endif
                    </span>
                </li>
            @endforeach
        </ul>
    @endif
@endsection
