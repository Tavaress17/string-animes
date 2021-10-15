<?php
require_once './php/Animes_Service.php';
$a_service = new Animes_Service("string_animes", "localhost", "root", "");
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link 
      rel="stylesheet" 
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
      integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" 
      crossorigin="anonymous"
    >
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
          <button type="button" class="loginBtn p-0">
            <svg 
              xmlns="http://www.w3.org/2000/svg" 
              width="50" 
              height="50" 
              viewBox="0 0 24 24" 
              fill="none" 
              stroke="#7031B3" 
              stroke-width="2" 
              stroke-linecap="round" 
              stroke-linejoin="round"
              class="loginIcon"
            >
              <path d="M5.52 19c.64-2.2 1.84-3 3.22-3h6.52c1.38 0 2.58.8 3.22 3"/>
              <circle cx="12" cy="10" r="3"/>
              <circle cx="12" cy="12" r="10"/>
            </svg>
          </button>
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
    <div class="container-card my-4 px-4">
      <?php
        $a_service->carregarCards();
      ?>
      <!--Inicio Cartão-->
      <div class="card bg-black border-purple pb-4 cursorh-pointer">
        <img src="img/animes-banner/tokyoghoul.jpg" class="anime-image" alt="">
        <div class="conteudo">
          <h2 class="text-center text-light my-2">Tokyo Ghoul</h2>
          <div class="card-sinopse">
            <p class="text-justify text-light">
              Tóquio é assombrada por ghouls, humanos que se alimentam somente de carne humana. 
              As pessoas estão tomadas de medo dessas “criaturas” cuja identidade é um mistério. 
              Um estudante chamado Kaneki encontra Rize, uma menina que é uma ávida leitora como ele, 
              no café que frequenta. Como Kaneki tem uma queda por Rize, eles se encontram com cada 
              vez mais frequência, até uma noite fatídica. Kaneki descobre da pior forma possível 
              que Rize é um Ghoul, porém acaba escapando por pura sorte, mas com sérios ferimentos. 
              Quando se recupera descobre que órgãos da Ghoul foram passados para o seu corpo, 
              lhe dando a mesma sede de sangue das criaturas.
            </p>
            <a href=""> Mais... </a>
          </div>
          <div class="float-right mt-3">
            <div class="btn-group">
              <button type="button" class="btn btn-outline-light btn-editar">Editar</button>
              <button type="button" class="btn btn-outline-light btn-excluir">Excluir</button>
            </div>
          </div>
        </div>
      </div>
      <!--Fim Cartão-->
      <div class="card bg-black border-purple pb-4 cursorh-pointer" id="adicionarAnime" onclick="document.getElementById('adicionarAnime').style.display='none';document.getElementById('formAnime').style.display='block'">
        <div class="card-plus text-center">
          <svg 
            xmlns="http://www.w3.org/2000/svg" 
            width="100" 
            height="100" 
            viewBox="0 0 24 24" 
            fill="none" 
            stroke="#853bd4" 
            stroke-width="3" 
            stroke-linecap="round" 
            stroke-linejoin="round"
          >
            <line x1="12" y1="5" x2="12" y2="19"></line>
            <line x1="5" y1="12" x2="19" y2="12"></line>
          </svg>
        </div>
      </div>
      <div id="formAnime" class="card card-form bg-black border-green pb-4 cursorh-pointer">
        <div class="p-0">
          <div class="text-center text-light">         
            <form method="post" action="./php/pdo.php">
              <label for="nomeAnime">Nome do Anime:</label>
              <input class="input-adicionar-anime text-light bg-black border-green" type="text" name="nomeAnime" id="nomeAnime" placeholder="Nome do Anime">
              <label for="sinopse">Sinopse:</label>
              <input class="input-adicionar-anime text-light bg-black border-green" type="text" name="sinopse" id="sinopse" placeholder="Sinopse">
              <label for="genero">Gênero:</label>                  
              <div class="d-flex justify-content-center">          
                <select class="select-adicionar-anime text-light bg-black border-green" name="genero" id="genero">
                  <option class="option-adicionar-anime" value="Comedia" selected="selected">Comédia</option>
                  <option class="option-adicionar-anime" value="Esportes">Esportes</option>
                  <option class="option-adicionar-anime" value="Fantasia">Fantasia</option>
                  <option class="option-adicionar-anime" value="Scifi">Ficção Científica</option>
                  <option class="option-adicionar-anime" value="Isekai">Isekai</option>
                  <option class="option-adicionar-anime" value="Romance">Romance</option>
                  <option class="option-adicionar-anime" value="Shounen">Shounen</option>
                  <option class="option-adicionar-anime" value="Slice Life">Slice Life</option>
                  <option class="option-adicionar-anime" value="Suspense">Suspense</option>
                  <option class="option-adicionar-anime" value="Terror">Terror</option>         
                </select>
              </div> 
              <label for="dataLancamento">Data de Lançamento:</label>
              <input class="input-adicionar-anime text-light bg-black border-green" type="text" name="dataLancamento" id="dataLancamento" placeholder="Ano de Lançamento">
              <label for="statusLancamento">Status:</label>
              <div class="d-flex justify-content-center">
                <select class="select-adicionar-anime text-light bg-black border-green" name="statusLancamento" id="statusLancamento" placeholder="Status de Lançamento">
                  <option class="option-adicionar-anime" value="Concluido" selected="selected">Concluido</option>
                  <option class="option-adicionar-anime" value="Em lançamento">Em lançamento</option>
                </select>
>>>>>>> develop
              </div>
              <label for="animeImagem">Nome para o path da imagem:</label>      
              <input class="input-adicionar-anime text-light bg-black border-green" type="text" name="animeImagem" id="animeImagem" placeholder="Nome minúsculo. Ex: naruto">
              <input type="submit" value="Adicionar Anime" class="submit-adicionar-anime text-black bg-green border-green">
            </form>
          </div>
        </div>
      </div>
    </div>
    <!--Footer--> 
    <footer id="sticky-footer" class="flex-shrink-0 py-4 text-white bordertop-purple">
      <div class="container text-center">
        <small>Copyright &copy; STRING Animes</small>
      </div>
    </footer>
    <!--Footer--> 
    <!-- jQuery  -->
    <script 
      src="https://code.jquery.com/jquery-3.3.1.slim.min.js" 
      integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" 
      crossorigin="anonymous"
    ></script>
    <script 
      src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" 
      integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" 
      crossorigin="anonymous"
    ></script>
    <script 
      src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" 
      integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" 
      crossorigin="anonymous"
    ></script>
    <!-- jQuery  -->
  </body>
</html>