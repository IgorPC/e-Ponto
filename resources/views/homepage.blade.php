@extends('layouts.layout')

@section('titulo')
    Home
@endsection

@section('conteudo')
    @if(auth()->user()->verify_data == 0)
        <div class="alert alert-secondary" role="alert">
            <h4 class="alert-heading text-center">Você precisa atualizar seus dados!</h4>
            <p class="text-center">Para prosseguir utilizando o sistema você precisa atualizar seus dados pessoais.</p>
            <hr>
            <p class="mb-0 text-center"><a class="links" href="{{route('admin.user.edit', ['id' => auth()->user()->id])}}">Clique aqui para atualizar os dados <i class="fas fa-users-cog"></i></a></p>
        </div>
    @else
        <div class="jumbotron">
            <h1 class="display-4 titulo-interno">Sejam Bem Vindos ao e-Ponto!</h1>
            <p class="lead">
                Esse sistema foi idealizado para simular um relógio de ponto virtual como os utilizados nas
                empresas para controlar a freqüência de seus colaboradores. Porém esse projeto não possui caráter comercial
                e todas as informações cadastradas nele são fictícias e de total responsabilidade do usuário que a inserir,
                visto que ele está aberto para o publico.
            </p>
            <hr class="my-4">
            <p>Para mais informações sobre o projeto, clique no botão abaixo.</p>
            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#staticBackdrop">
                Sobre o projeto
            </button>
        </div>
        <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title modal-contato" id="sobreModalLabel">Sobre o e-Ponto</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body texto-modal">
                        <p>
                            O e-Ponto foi um projeto totalmente idealizado por mim, e ele simula o funcionamento de um relógio
                            de ponto de uma pequena empresa.
                        </p>
                        <p>
                            Esse sistema foi desenvolvido utilizando Laravel, Postgree SQL, Javascript e Bootstrap.
                        </p>
                        <p>
                            Ele permite que um usuário cadastre sua própria empresa ou se vincule a uma empresa já existente,
                            caso ele queria se vincular a uma empresa, o administrador da empresa solicitada deve aceitar o pedido,
                            uma vez vinculado a uma empresa, o usuário consegue registrar seus pontos.
                        </p>
                        <p>
                            O usuário administrador consegue desvincular os usuários vinculados a sua empresa ou inutilizar a mesma,
                            em caso de inutilizarão, todos os colaboradores vinculados a empresa com exceção do administrador são
                            automaticamente desvinculados e passa ser impossível se vincular a empresa ate que o administrador ative
                            ela novamente.
                        </p>
                        <p>
                            Por fim, o administrador da empresa consegue gerar relatórios dos colaboradores vinculados a empresa em
                            formato PDF (Utilizado o mPDF).
                        </p>
                        <hr>
                        <p class="text-center modal-contato mb-4">Contato: </p>
                        <div class="row">
                            <div class="col-3">
                                <a class="icons-modal" href="https://github.com/IgorPC" target="_blank"><p class="text-center"><i class="fab fa-github-square"></i></p></a>
                            </div>
                            <div class="col-3">
                                <a class="icons-modal" href="https://www.linkedin.com/in/igor-c-9a9969112/" target="_blank"><p class="text-center"><i class="fab fa-linkedin"></i></p></a>
                            </div>
                            <div class="col-3">
                                <a class="icons-modal" href="https://www.instagram.com/igorpcoutinho/" target="_blank"><p class="text-center"><i class="fab fa-instagram"></i></p></a>
                            </div>
                            <div class="col-3">
                                <a class="icons-modal" href="https://igorpc.github.io/portfolio/" target="_blank"><p class="text-center"><i class="fas fa-globe"></i></p></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    @endif
@endsection
