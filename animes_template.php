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
                                            <input class="form-check-input checkboxCustom" type="checkbox" value="" id="lembrarLogin" />
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
            <!--Banner inicio-->
            <section class="banner">
                <div class="p-0">
                    <img class="img-banner bordery-purple" src="./img/banner-index.jpg" alt="Banner">
                </div>
            </section>
            <!--Banner fim-->
            <!--IMAGEM + DESCRIÇÃO (INICIO)-->
            <div class="borderbottom-purple">
                <p class="text-center text-light font-weight-bold display-5 text-uppercase">one piece</p>
            </div>
            <div class="container-anime-template">
                <div class="grid-descricao p-5">
                    <img src="./img/animes-banner/tokyoghoul.jpg" alt="NOME ANIME"
                        class="image-anime-template border-purple p-2">
                </div>
                <div class="descricao-template font-anime-template py-5 pl-5">
                    <p class="text-green">Nome: <span class="text-light">Shimoneta to Iu Gainen ga Sonzai Shinai Taikutsu na Sekai</span></p>
                    <p class="text-green">Gênero: <span class="text-light">Comédia</span></p>
                    <p class="text-green">Estado: <span class="text-light">Finalizado</span></p>
                    <p class="text-green">Ano de Lançamento: <span class="text-light">2013</span></p>        
                </div>
            </div>
            <!--IMAGEM + DESCRIÇÃO (FIM)-->
            <!--SINOPSE (INICIO)-->
            <div class="font-anime-template sinopse-anime px-5 mb-5">
                <p class="text-green">
                    Sinopse:
                    <span class="text-light fulljustify">
                        Lucy é uma garota de 16 anos que quer se tornar uma maga completa, para isso,
                        ela precisa entrar em uma guilda de magos. Um dia visitando a cidade de Harujion,
                        ela conhece Natsu, um jovem rapaz que fica facilmente enjoado com qualquer tipo de
                        transporte.
                        Mas Natsu não é apenas uma criança fraca, ele é um membro de uma das maiores
                        e infames guildas: FAIRY TAIL.
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
                <div class="cardRecomendados p-4 m-2 border-purple">
                    <a href="">
                        <img src="./img/animes-banner/fairytail.jpg" alt="NOME ANIME"class="image-anime-template p-2">
                    </a>
                    <p class="text-center text-light font-weight-bold display-5 text-uppercase">Fairy Tail</p>
                </div>
                <div class="cardRecomendados p-4 m-2 border-purple">
                    <a href="">
                        <img src="./img/animes-banner/naruto.jpg" alt="NOME ANIME"class="image-anime-template p-2">
                    </a>
                    <p class="text-center text-light font-weight-bold display-5 text-uppercase">Naruto</p>
                </div>
                <div class="cardRecomendados p-4 m-2 border-purple">
                    <a href="">
                        <img src="./img/animes-banner/onepiece.jpg" alt="NOME ANIME"class="image-anime-template p-2">
                    </a>
                    <p class="text-center text-light font-weight-bold display-5 text-uppercase">one piece</p>
                </div>
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