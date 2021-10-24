<?php
require_once './php/Animes_Service.php';
$anime_service = new Animes_Service("string_animes", "localhost", "root", "");
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
                    <div class="dropdown">
                        <a href="#" data-toggle="dropdown" aria-expanded="false" class="loginBtn p-0 nav-link dropdown">
                            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 24 24" fill="none"
                                stroke="#7031B3" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                class="loginIcon">
                                <path d="M5.52 19c.64-2.2 1.84-3 3.22-3h6.52c1.38 0 2.58.8 3.22 3" />
                                <circle cx="12" cy="10" r="3" />
                                <circle cx="12" cy="12" r="10" />
                            </svg>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right bg-black border-purple loginMenu">
                            <form class="px-4 py-3">
                                <div class="form-outline mb-4">
                                    <label class="form-label text-light" for="emailLogin">Email:</label>
                                    <input type="email" id="emailLogin"
                                        class="form-control inputLogin text-light bg-black border-purple" />
                                </div>
                                <div class="form-outline mb-4">
                                    <label class="form-label text-light" for="senhaLogin">Senha:</label>
                                    <input type="password" id="senhaLogin"
                                        class="form-control inputLogin text-light bg-black border-purple" />
                                </div>
                                <div class="row mb-4">
                                    <!--Checkbox-->
                                    <div class="col d-flex justify-content-center">
                                        <div class="form-check">
                                            <input class="form-check-input checkboxCustom" type="checkbox" value=""id="lembrarLogin" />
                                            <label class="pl-2 form-check-label text-light" for="lembrarLogin">Lembrar-se de mim</label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <a class="text-green" href="#!">Esqueceu a senha?</a>
                                    </div>
                                </div>
                                <button type="submit"
                                    class="btn btn-entrar text-white bg-black border-purple btn-block">Entrar</button>
                            </form>
                            <div class="d-flex justify-content-center bordertop-purple py-2">
                                <a class="text-green" href="telaCadastro.php">Não tem uma conta? Crie uma!</a>
                            </div>
                        </div>
                    </div>
                    <!--Login Dropdown-->
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
        </main>
        <!--Contéudo Site-->
        <p class="font-weight-bold text-center mt-3 text-light display-4">ANIMES</p>
        
        <?php
            if(isset($_GET['id_anime'])){
                $id_anime = $_GET['id_anime'];
                $res = $anime_service->buscarAnimeById($id_anime);
                $_SESSION['anime_att'] = $res['idAnime']; 
            }
        ?>
        
        <div class="container-card my-4 px-4">
        <div class="card bg-black border-purple pb-4 cursorh-pointer" id="adicionarAnime" onclick="document.getElementById('adicionarAnime').style.display='none';document.getElementById('formAnime').style.display='block'">
                <div class="card-plus text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 24 24" fill="none" stroke="#853bd4" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="12" y1="5" x2="12" y2="19"></line>
                        <line x1="5" y1="12" x2="19" y2="12"></line>
                    </svg>
                </div>
            </div>
            <div id="formAnime" class="card card-form bg-black border-green pb-4 cursorh-pointer">
                <div class="p-0">
                    <div class="text-center text-light">
                        <form method="post" action="./php/Animes_Controller.php" enctype="multipart/form-data">
                            <label for="nomeAnime">Nome do Anime:</label>
                            <input class="input-adicionar-anime text-light bg-black border-green" type="text" name="nomeAnime" id="nomeAnime" placeholder="Nome do Anime" value="<?php if(isset($res)){echo $res['nomeAnime'];} ?>">
                            <label for="sinopse">Sinopse:</label>
                            <input class="input-adicionar-anime text-light bg-black border-green" type="text" name="sinopse" id="sinopse" placeholder="Sinopse" value="<?php if(isset($res)){echo $res['sinopse'];} ?>">
                            <label for="genero">Gênero:</label>
                            <div class="d-flex justify-content-center">
                                <select class="select-adicionar-anime text-light bg-black border-green" name="genero" id="genero">
                                    <option class="option-adicionar-anime" value="Comedia" <?php if(isset($res) && $res['genero'] == 'Comedia'){echo "selected = 'SELECTED'" ;} ?>>Comédia</option>
                                    <option class="option-adicionar-anime" value="Esportes" <?php if(isset($res) && $res['genero'] == 'Esportes'){echo "selected = 'SELECTED'" ;} ?>>Esportes</option>
                                    <option class="option-adicionar-anime" value="Fantasia" <?php if(isset($res) && $res['genero'] == 'Fantasia'){echo "selected = 'SELECTED'" ;} ?>>Fantasia</option>
                                    <option class="option-adicionar-anime" value="Scifi" <?php if(isset($res) && $res['genero'] == 'Scifi'){echo "selected = 'SELECTED'" ;} ?>>Ficção Científica</option>
                                    <option class="option-adicionar-anime" value="Isekai"> <?php if(isset($res) && $res['genero'] == 'Isekai'){echo "selected = 'SELECTED'" ;} ?>Isekai</option>
                                    <option class="option-adicionar-anime" value="Romance" <?php if(isset($res) && $res['genero'] == 'Romance'){echo "selected = 'SELECTED'" ;} ?>>Romance</option>
                                    <option class="option-adicionar-anime" value="Shounen" <?php if(isset($res) && $res['genero'] == 'Shounen'){echo "selected = 'SELECTED'" ;} ?>>Shounen</option>
                                    <option class="option-adicionar-anime" value="Slice of Life" <?php if(isset($res) && $res['genero'] == 'Slice of Life'){echo "selected = 'SELECTED'" ;} ?>>Slice Life</option>
                                    <option class="option-adicionar-anime" value="Suspense" <?php if(isset($res) && $res['genero'] == 'Suspense'){echo "selected = 'SELECTED'" ;} ?>>Suspense</option>
                                    <option class="option-adicionar-anime" value="Terror" <?php if(isset($res) && $res['genero'] == 'Terror'){echo "selected = 'SELECTED'" ;} ?>>Terror</option>
                                </select>
                            </div>
                            <label for="dataLancamento">Data de Lançamento:</label>
                            <input class="input-adicionar-anime text-light bg-black border-green" type="text" name="dataLancamento" id="dataLancamento" placeholder="Ano de Lançamento" value="<?php if(isset($res)){echo $res['dataLancamento'];} ?>">
                            <label for="statusLancamento">Status:</label>
                            <div class="d-flex justify-content-center">
                                <select class="select-adicionar-anime text-light bg-black border-green" name="statusLancamento" id="statusLancamento" placeholder="Status de Lançamento">
                                    <option class="option-adicionar-anime" value="Concluido" <?php if(isset($res) && $res['statusLancamento'] == 'Concluido'){echo "selected = 'SELECTED'" ;} ?>>Concluido</option>
                                    <option class="option-adicionar-anime" value="Em lançamento" <?php if(isset($res) && $res['statusLancamento'] == 'Em lançamento'){echo "selected = 'SELECTED'" ;} ?>>Em lançamento</option>
                                </select>
                            </div>
                            <?php  
                                if(!isset($res)){
                                    echo '
                                    <label for="animeImagem">Nome para o path da imagem:</label>
                                    <input class="input-adicionar-anime text-light bg-black border-green" type="text" name="animeImagem" id="animeImagem" placeholder="Nome minúsculo. Ex: naruto">
                                    <label for="imagem">Imagem:</label>
                                    ';
                                }else{
                                    echo " <label>Imagem cadastrada: ".$res['animeImagem']."</label><br>"
                                            . "<label for='imagem'>Imagem:</label>";

                                }
                            ?>
                           
                            <input type="file" name="imagem"/>
                            <input type="submit" name="<?php if(isset($res)){echo 'btn-editar-anime';}else{echo 'btn-cadastro-anime';} ?>" value="<?php if(isset($res)){echo 'Atualizar dados';}else{echo 'Adicionar anime';} ?>" class="submit-adicionar-anime text-black bg-green border-green">
                        </form>
                    </div>
                </div>
            </div>
            <!--Inicio Cartão-->
            <?php
                if (isset($_GET['pagina'])) {
                    $pagina = addslashes($_GET['pagina']);
                    $pg = $pagina;
                } else {
                    $pg = 1;
                }
            
                $anime_service->carregarCards(9,$pg);
            ?>
            <!--Fim Cartão-->
        </div>
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
        <!-- jQuery  -->
    </body>
</html>