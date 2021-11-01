<?php
    require_once './php/User_Service.php';
    $user_service = new User_Service("string_animes", "localhost", "root", "");
    session_start();
    
    if(!isset($_SESSION['logado']) || $_SESSION['logado'] == false){
        header('Location: index.php');
    }
    
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <!-- Meta tags Obrigatórias -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
            integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <!--CSS, Icone e Titulo da Aba-->
        <link rel="stylesheet" href="./css/style.css">
        <link rel="icon" href="./img/icon-index.png">
        <title>STRING Animes</title>
    </head>
    <body>
        <header>
            <!--Navbar-->
            <div class="py-3 navbar bg-black">
                <div class="container">
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
                    <!--Login Dropdown-->
                    <?php  
                        include_once 'login_dropdown.php';
                    ?>
                </div>
            </div>
            <!--Navbar-->
        </header>
        <!--Contéudo Site-->
        <main role="main bg-black" style="overflow-x: hidden">
            <!--Banner-->
            <section class="banner">
                <div class="p-0">
                    <img class="img-banner bordery-purple" src="./img/banner-index.jpg" alt="Banner">
                </div>
            </section>
            <!--Banner-->
            <?php
            if(isset($_SESSION['logado'])){//Se o usuário estiver logado, pegue os dados
                if(isset($_SESSION['user']) && !empty($_SESSION['user'])){
                    $id = $_SESSION['user'];
                    $res = $user_service->buscarUserById($id);
                    $nome = $res['nome'];
                    $email = $res['email'];
                    $data_nasc = $res['data_nasc'];
                    $imagem = $res['img_user'];
                }else{
                    header('Location: index.php');
                }
            }else{
                header('Location: index.php');
            }
            
            if(isset($_GET['usuario'])&& !empty($_GET['usuario'])){//VERIFICA SE CLICOU NO EDITAR
                echo "<style>
                    .content-profile{display: none;}
                        
                    .atualizar-cadastro{display: flex;}
                </style>";
            }else{
                echo "<style>
                    .content-profile{display: flex;}
                        
                    .atualizar-cadastro{display: none;}
                </style>";
            }
            
            if(isset($_GET['encerrar'])&& !empty($_GET['encerrar'])){//VERIFICA SE DESEJA ENCERRAR CONTA
                $id_end = $_GET['encerrar'];
                $resp = $user_service->buscarUserById($id_end);
                if(!empty($resp)){
                    $user_service->apagarConta($id_end);
                    header('Location: ./php/logout.php');
                }else{
                    echo "Conta não encontrada";
                }
                
            }
            ?>
            
            <div class="d-flex justify-content-center">
                <section class="content-profile d-flex flex-column borderx-purple py-5">
                    <article class="d-flex flex-column user">
                        <div class="img-profile p-1 border-purple">      
                        <?php
                            if(empty($imagem)){
                                echo "<img src='./img/img_profile/tsuki.jpg' style='object-fit: cover;'/>";
                            }else{
                                echo "<img src='./img/img_profile/".$imagem."' style='object-fit: cover;'/>";
                            }
                        ?>
                        </div>
                        <h3 class="text-purple mt-2"><?php echo "$nome"; ?></h3>
                    </article>
                    <div class="d-flex justify-content-center">
                        <article class="informacoes" id="informacoes">
                            <p><span>Nome: </span><?php echo "$nome"; ?> </p>
                            <p><span>E-mail:</span> <?php echo "$email"; ?></p>
                            <p><span>Data de Nascimento:</span> <?php echo "$data_nasc"; ?></p>
                        </article>
                    </div>
                    <div class='d-flex justify-content-center pt-4'>
                        <div class='btn-group'>
                            <a href="perfil_template.php?usuario=<?php echo "$id"; ?>" class='btn bg-black border-purple text-purple font-weight-bold btn-editar-profile' name="usuario">Editar</a>
                            <a href="./php/logout.php" class='btn bg-black border-purple text-purple font-weight-bold btn-logout' name="user_quit">Logout</a>
                            <a href="perfil_template.php?encerrar=<?php echo "$id"; ?>" class='btn bg-black border-purple text-purple font-weight-bold btn-editar-profile' name="encerrar_conta">Encerrar</a>
                        </div>
                    </div>
                </section>
                
                <section class="atualizar-cadastro flex-column p-5" id="att-cadastro">
                    <h1 class="m-3 text-center text-purple">Alterar Dados</h1>
                    <div class="d-flex justify-content-center mb-5">
                        <form method="POST" action="./php/User_Controller.php" enctype="multipart/form-data" style="width: 500px;">
                            <div  class="form-outline mb-4">
                                <label class="form-label text-light" for="nome">Nome de usuário:</label>
                                <input type="text" id="usernameLogin" value="<?php echo "$nome" ?>" name="nome" class="form-control inputLogin text-light bg-black border-purple" />
                            </div>
                            <div class="form-outline mb-4">
                                <label class="form-label text-light" for="email">Email:</label>
                                <input type="email" id="emailLogin" value="<?php echo "$email" ?>" name="email" class="form-control inputLogin text-light bg-black border-purple" />
                            </div>
                            <div class="form-outline mb-4">
                                <label class="form-label text-light" for="data_nasc">Data de Nascimento:</label>
                                <div class="d-flex justify-content-center">
                                    <input class="pl-1 inputAniversario" type="date" value="<?php echo "$data_nasc" ?>" name="data_nasc" id="aniversario">
                                </div>  
                            </div>
                            <div class="form-outline mb-4">
                                <label class="form-label text-light" for="imagem">Imagem:</label>
                                <input type="file" name="imagem" />  
                            </div>
                            <button type="submit" name="btn-atualizar" class="btn btn-entrar text-white bg-black border-purple btn-block">Atualizar</button>
                        </form>
                    </div> 
                </section>
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
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
            integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
            crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
            integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
            crossorigin="anonymous"></script>
    </body>
</html>