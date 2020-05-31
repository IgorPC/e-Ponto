@extends('layouts.layout')

@section('titulo')
    {{$user->name}}
@endsection

@section('conteudo')
    <h1 class="titulo-interno">Atualizar dados</h1>
    <hr>
    @include('mensagens.sucesso')
    <form method="POST" action="{{route('admin.user.update', ['id' => $user->id])}}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label>Nome: </label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{$user->name}}">
            @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputPassword1">Email: </label>
                    <input disabled type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{$user->email}}">
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
                    <input type="text" name="celular" class="form-control @error('celular') is-invalid @enderror" value="@if($user->verify_data == 0){{old('celular')}}@else{{$user->celular}}@endif">
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
                    <input type="text" name="rua" class="form-control @error('rua') is-invalid @enderror" value="@if($user->verify_data == 0){{old('rua')}}@else{{$user->rua}}@endif">
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
                    <input type="text" name="numero" class="form-control @error('numero') is-invalid @enderror" value="@if($user->verify_data == 0){{old('numero')}}@else{{$user->numero}}@endif">
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
                    <input type="text" name="bairro" class="form-control @error('bairro') is-invalid @enderror" value="@if($user->verify_data == 0){{old('bairro')}}@else{{$user->bairro}}@endif">
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
                    <input type="text" name="cidade" class="form-control @error('cidade') is-invalid @enderror" value="@if($user->verify_data == 0){{old('cidade')}}@else{{$user->cidade}}@endif">
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
                    <input type="text" name="pais" class="form-control @error('pais') is-invalid @enderror" value="@if($user->verify_data == 0){{old('pais')}}@else{{$user->pais}}@endif">
                    @error('pais')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
        </div>
        <button class="btn btn-outline-dark" type="submit">Atualizar dados</button>
    </form>
@endsection

