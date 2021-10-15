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
      <!--Banner inicio-->
      <section class="banner">
        <div class="p-0">
          <img class="img-banner bordery-853bd4" src="./img/banner-index.jpg" alt="Banner">
        </div>
      </section>
      <!--Banner fim-->
      
      <section class="content">
        <div class="m-0 p-0">
          <div class="borderbottom-853bd4">
            <p class="text-center text-light font-weight-bold display-5 text-uppercase">NARUTO</p>
          </div>
          <div class="grid-descricao p-0 m-0">
            <div class="p-5 div-image-template">
              <img src="./img/animes-banner/tokyoghoul.jpg" alt="NOME ANIME" class="image-anime-template border-853bd4 p-2">
            </div>
            <div class="my-4 descricao-template font-anime-template pr-5">
              <p class="text-2BFF67">Nome: <span class="text-light">Shimoneta to Iu Gainen ga Sonzai Shinai Taikutsu na Sekai</span></p>
              <p class="text-2BFF67">Gênero: <span class="text-light">Comédia</span></p>
              <p class="text-2BFF67">Estado: <span class="text-light">Finalizado</span></p>
              <p class="text-2BFF67">Ano de Lançamento: <span class="text-light">2013</span></p>
              <p class="text-2BFF67">
                Sinopse: 
                <span class="text-light fulljustify">
                  Lucy é uma garota de 16 anos que quer se tornar uma maga completa, para isso, 
                  ela precisa entrar em uma guilda de magos. Um dia visitando a cidade de Harujion,
                  ela conhece Natsu, um jovem rapaz que fica facilmente enjoado com qualquer tipo de transporte.
                  Mas Natsu não é apenas uma criança fraca, ele é um membro de uma das maiores 
                  e infames guildas: FAIRY TAIL.
                </span>
              </p>
            </div>
          </div>
        </div>
      </section>
      
    </main>
    <!--Contéudo Site-->
    <!--Footer-->
    <footer id="sticky-footer" class="flex-shrink-0 py-4 text-white bordertop-853bd4">
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
  </body>
</html>