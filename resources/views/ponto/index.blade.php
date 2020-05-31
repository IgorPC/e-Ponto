@extends('layouts.layout')

@section('titulo')
    Historico
@endsection

@section('conteudo')
    <h1 class="titulo-interno">Meu histórico</h1>
    <hr>
    @include('mensagens.sucesso')
    @include('mensagens.aviso')
    <ul class="list-group">
        @foreach($pontos as $key => $ponto)
            @if($ponto->status == 1)
                <div class="accordion" id="accordionExample">
                    <div class="card">
                        <div class="card-header" id="headingOne">
                            <h2 class="mb-0">
                                <button style="text-decoration: none" class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse{{$key}}" aria-expanded="true" aria-controls="collapseOne">
                                    {{$ponto->data->format('d/m/Y')}}
                                </button>
                            </h2>
                        </div>
            @endif
                        <div id="collapse{{$key}}" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                            <div class="card-body text-center">
                                <div class="row">
                                    <div class="col-md-3">
                                        @if(!is_null($ponto->primeira_entrada)) <span style="font-weight: bold; font-size: 1em">1ª <i class="fas fa-arrow-right"></i> {{$ponto->primeira_entrada->hour.':'.$ponto->primeira_entrada->minute.':'.$ponto->primeira_entrada->second}} </span> @else 1ª -- : -- : -- @endif
                                    </div>
                                    <div class="col-md-3">
                                        @if(!is_null($ponto->primeira_saida)) <span style="font-weight: bold; font-size: 1em">2ª <i class="fas fa-arrow-right"></i> {{$ponto->primeira_saida->hour.':'.$ponto->primeira_saida->minute.':'.$ponto->primeira_saida->second}} </span> @else 2ª -- : -- : --  @endif
                                    </div>
                                    <div class="col-md-3">
                                        @if(!is_null($ponto->segunda_entrada)) <span style="font-weight: bold; font-size: 1em">3ª <i class="fas fa-arrow-right"></i> {{$ponto->segunda_entrada->hour.':'.$ponto->segunda_entrada->minute.':'.$ponto->segunda_entrada->second}} </span> @else 3ª -- : -- : -- @endif
                                    </div>
                                    <div class="col-md-3">
                                        @if(!is_null($ponto->segunda_saida)) <span style="font-weight: bold; font-size: 1em">4ª <i class="fas fa-arrow-right"></i> {{$ponto->segunda_saida->hour.':'.$ponto->segunda_saida->minute.':'.$ponto->segunda_saida->second}} </span> @else 4ª -- : -- : -- @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
        @endforeach
    </ul>
@endsection
