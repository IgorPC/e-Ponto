<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <title>e-Ponto</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Oxygen+Mono&family=Pacifico&family=Source+Sans+Pro&display=swap" rel="stylesheet">
        <script src="https://kit.fontawesome.com/35505cabf9.js" crossorigin="anonymous"></script>

        <!-- Styles -->
        <link rel="stylesheet" href="{{asset('css/style.css')}}">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <style>
            html, body {
                background-color: #c1cece;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 100px;
                color: #000bce;
                text-shadow: 1px 1px black;
                font-family: 'Pacifico', cursive;
            }

            .links > a {
                color: #434452;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .links > a:hover{
                color: #000bce;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="title m-b-md">
                    e-Ponto
                </div>

                <div class="links">
                    <a href="{{route('login')}}">Entrar</a>
                    <a href="{{route('register')}}">Registrar</a>
                    <a data-toggle="modal" data-target="#exampleModal" href="">Sobre</a>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title modal-contato" id="sobreModalLabel">Sobre o e-Ponto</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body texto-modal font-weight-bold">
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

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    </body>
</html>
