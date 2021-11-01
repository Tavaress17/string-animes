<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <!--CSS, Icone e Titulo da Aba-->
    <link rel="stylesheet" href="./css/style.css">
    <link rel="icon" href="./img/icon-index.png">
    <title>STRING Animes</title>
    <!--Js-->
    <script type="text/javascript" src="js/viewPassword.js"></script>
</head>

<body>
    <header>
        <!--Navbar-->
        <div class="py-3 navbar bg-black borderbottom-purple">
            <div class="container d-flex justify-content-center">
                <a href="index.php" class="text-decoration-none">
                    <img class="navIcon" src="./img/icon-index.png" alt="Ícone Site">
                    <strong class="px-2 m-0">
                        <span id="string-span">
                            STRING
                            <span id="anime-span">
                                Animes
                            </span>
                        </span>
                    </strong>
                </a>
            </div>
        </div>
        <!--Navbar-->
    </header>
    <!--Contéudo Site-->
    <main role="main bg-black" style="overflow-x: hidden">
    <h1 class="m-3 text-center text-purple">Crie sua conta</h1>
    <div class="d-flex justify-content-center mb-5">
        <form method="POST" action="./php/User_Controller.php" style="width: 500px;">
            <div  class="form-outline mb-4">
                <label class="form-label text-light" for="usernamelLogin">Nome de usuário:</label>
                <input type="text" id="usernameLogin" name="nome" class="form-control inputLogin text-light bg-black border-purple" />
            </div>
            <div class="form-outline mb-4">
                <label class="form-label text-light" for="emailLogin">Email:</label>
                <input type="email" id="emailLogin" name="email" class="form-control inputLogin text-light bg-black border-purple" />
            </div>
            <div class="form-outline mb-3">
                <label class="form-label text-light" for="senhaLogin">Senha:</label>
                <input type="password" id="senhaLogin" name="senha" class="form-control inputLogin text-light bg-black border-purple"/>
                <div class="form-check mt-2">
                    <input class="form-check-input checkboxCustom" type="checkbox" onclick="visualizarSenha()" value="" id="lembrarLogin" />
                    <label class="pl-2 pt-1 form-check-label text-light" for="lembrarLogin">Visualizar senha</label>
                </div>
            </div>
            <div class="form-outline mb-4">
                <label class="pl-2 pt-1 form-check-label text-light" for="lembrarLogin">Confirmar Senha:</label>
                <input type="password" id="confirmSenhaLogin" name="confirmSenha" class="form-control inputLogin text-light bg-black border-purple" />
                <div class="form-check mt-2">
                    <input class="form-check-input checkboxCustom" type="checkbox" onclick="visualizarConfirmarSenha()" value=""id="lembrarLogin" />
                    <label class="pl-2 pt-1 form-check-label text-light" for="lembrarLogin">Visualizar senha</label>
                </div>
            </div>
            <div class="form-outline mb-4">
                <label class="form-label text-light" for="aniversario">Data de Nascimento:</label>
                <div class="d-flex justify-content-center">
                    <input class="pl-1 inputAniversario" type="date" name="data_nasc" id="aniversario">
                </div>  
            </div>
            <button type="submit" name="btn-cadastro" class="btn btn-entrar text-white bg-black border-purple btn-block">Registrar-se</button>
        </form>
    </div> 
    </main>
    <!--Contéudo Site-->
    <!--Footer-->
    <footer id="sticky-footer" class="flex-shrink-0 py-4 text-white bordertop-purple">
        <div class="container text-center">
            <small>Copyright &copy; STRING Animes</small>
        </div>
    </footer>
    <!--Footer-->
    <!-- jQuery  -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>