@extends('layouts.layout')

@section('titulo')
    Relatorios
@endsection

@section('conteudo')
    <h1 class="titulo-interno">Relatórios</h1>
    <hr>
        <div class="row">
            <div class="col-md-6">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="mb-4 text-center">Gerar para todos os colaboradores</h5>
                        <div class="mb-4">
                            <form action="{{route('admin.relatorio.all', ['id' => auth()->user()->empresa_id])}}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Data Inicial: </label>
                                            <input required type="date" name="inicial" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Data Final: </label>
                                            <input required type="date" name="final" class="form-control">
                                        </div>
                                    </div>
                                    <button class="btn btn-outline-dark w-100 ml-3 mr-3" type="submit">Gerar relatório para todos os colaboradores</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="mb-4 text-center">Gerar para um colaborador especifico</h5>
                        <div class="mb-4">
                            <form action="{{route('admin.relatorio.select')}}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Data Inicial: </label>
                                            <input required name="inicial" type="date" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Data Final: </label>
                                            <input required name="final" type="date" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <select name="user" class="form-control">
                                            @foreach($users as $user)
                                                <option value="{{$user->id}}">{{$user->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-6">
                                        <button class="btn btn-dark w-100" type="submit">Gerar relatório</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
