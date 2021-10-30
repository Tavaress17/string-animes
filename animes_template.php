<?php
require_once './php/Animes_Service.php';
$anime_service = new Animes_Service("string_animes", "localhost", "root", "");
session_start();
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
                    <!--Login Dropdown-->
                </div>
            </div>
            <!--Navbar-->
        </header>
        <!--Contéudo Site-->
        <main role="main bg-black" style="overflow-x: hidden">
            <!--Banner inicio-->
            <section class="banner">
                <div class="p-0">
                    <img class="img-banner bordery-purple" src="./img/banner-index.jpg" alt="Banner">
                </div>
            </section>
            <!--Banner fim-->
            <?php
                if(isset($_GET['anime']) && !empty($_GET['anime'])){
                    $id_anime = addslashes($_GET['anime']);
                    if(!empty($anime_service->buscarAnimeById($id_anime))){
                        $res = $anime_service->buscarAnimeById($id_anime);
                    }else{
                        header('Location: index.php');
                    }
                }else{
                    header('Location: index.php');
                }
            ?>
            
            <!--IMAGEM + DESCRIÇÃO (INICIO)-->
            <div class="borderbottom-purple">
                <p class="text-center text-light font-weight-bold display-5 text-uppercase"><?php echo $res['nomeAnime']; ?></p>
            </div>
            <div class="container-anime-template">
                <div class="grid-descricao p-5">
                    <img src="../string-animes/img/animes-banner/<?php echo $res['animeImagem']; ?>" alt="<?php echo $res['nomeAnime']; ?>"
                        class="image-anime-template border-purple p-2" style='object-fit: cover;'>
                </div>
                <div class="descricao-template font-anime-template py-5 pl-5">
                    <p class="text-green">Nome: <span class="text-light"><?php echo $res['nomeAnime']; ?></span></p>
                    <p class="text-green">Gênero: <span class="text-light"><?php echo $res['genero']; ?></span></p>
                    <p class="text-green">Estado: <span class="text-light"><?php echo $res['statusLancamento']; ?></span></p>
                    <p class="text-green">Ano de Lançamento: <span class="text-light"><?php echo $res['dataLancamento']; ?></span></p>        
                </div>
            </div>
            <!--IMAGEM + DESCRIÇÃO (FIM)-->
            <!--SINOPSE (INICIO)-->
            <div class="font-anime-template sinopse-anime px-5 mb-5">
                <p class="text-green">
                    Sinopse:
                    <span class="text-light fulljustify">
                        <?php echo $res['sinopse']; ?>
                    </span>
                </p> 
            </div>
            <!--SINOPSE (FIM)-->
            <!--COMENTARIO (INICIO)-->
            <div class="borderbottom-purple bordertop-purple">
                <p class="text-center text-light font-weight-bold display-5 text-uppercase">comentário</p>
            </div>
            <form class="comentario p-5">
                <input class="border-purple mb-4 p-2 bg-black" type="text" id="autor" name="autor" placeholder="Nome">
                <textarea class="border-purple mb-4 p-2 bg-black" name="comentario" id="comentario" cols="45" rows="8" placeholder="Digite seu comentário"></textarea>
                <input class="btn-enviar bg-black border-purple py-2 mt-1"type="submit">
            </form>
            <!--COMENTARIO (FIM)-->
            <!--ANIMES (INICIO)-->
            <div class="borderbottom-purple bordertop-purple">
                <p class="text-center text-light font-weight-bold display-5 text-uppercase">animes</p>
            </div>
            <div class="container-anime-template">
                <?php 
                    if(isset($_GET['anime']) && !empty($_GET['anime'])){
                        $anime_service->recomendados($id_anime);
                    }
                ?>
            </div>
            <!--ANIMES (FIM)-->
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