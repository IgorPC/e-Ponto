@extends('layouts.layout')

@section('titulo')
    {{$empresa->nome}}
@endsection

@section('conteudo')
    <h1 class="titulo-interno">Atualizar empresa</h1>
    <hr>
    <form method="POST" action="{{route('admin.empresa.update', ['id' => $empresa->id])}}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label>Nome: </label>
            <input type="text" name="nome" class="form-control @error('nome') is-invalid @enderror" value="{{$empresa->nome}}">
            @error('nome')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputPassword1">Email: </label>
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{$empresa->email}}">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputPassword1">Celular: </label>
                    <input type="text" name="celular" class="form-control @error('celular') is-invalid @enderror" value="{{$empresa->celular}}">
                    @error('celular')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="form-group">
                    <label>Rua: </label>
                    <input type="text" name="rua" class="form-control @error('rua') is-invalid @enderror" value="{{$empresa->rua}}">
                    @error('rua')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="exampleInputPassword1">Numero: </label>
                    <input type="text" name="numero" class="form-control @error('numero') is-invalid @enderror" value="{{$empresa->numero}}">
                    @error('numero')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label>Bairro: </label>
                    <input type="text" name="bairro" class="form-control @error('bairro') is-invalid @enderror" value="{{$empresa->bairro}}">
                    @error('bairro')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="exampleInputPassword1">Cidade: </label>
                    <input type="text" name="cidade" class="form-control @error('cidade') is-invalid @enderror" value="{{$empresa->cidade}}">
                    @error('cidade')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="exampleInputPassword1">Pais: </label>
                    <input type="text" name="pais" class="form-control @error('pais') is-invalid @enderror" value="{{$empresa->pais}}">
                    @error('pais')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
        </div>
        <button class="btn btn-outline-dark" type="submit">Atualizar Empresa</button>
    </form>
@endsection
