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
    <link rel="stylesheet" href="./css/style.css">
    <link rel="icon" href="./img/icon-index.png">
    <title>STRING Animes</title>
  </head>
  <body>
    <header>
      <div class="navbar-custom navbar navbar-dark bg-customColor1 shadow-sm">
        <div class="container string-animes-navbar">
          <a href="index.php" class="text-decoration-none">
            <img class="navIcon" src="./img/icon-index.png" alt="Ícone Site">
            <strong class="navbar-strong-name">
              <span id="string-span">
                STRING
                <span id="anime-span">
                  Animes
                </span>
              </span>
            </strong>
          </a>
          <button type="button" class="loginBtn">
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
    </header>
    <main role="main main-bg-black" style="overflow-x: hidden">
      <section class="jumbotron-fluid">
        <div class="container-fluid">
          <img class="img-banner" src="./img/banner-index.jpg" alt="Teste Banner">
        </div>
      </section>
      <div>
        <div class="row">
          <div class="col-9 m-0 p-0">
            <div class="titulo-anime-template">
              <p class="text-center text-light font-weight-bold display-5">TESTE</p>
            </div>
            <div class="row p-0 m-0">
              <div class="m-5 div-image-template">
                <img src="./img/animes-banner/fairytail.jpg" alt="NOME ANIME" class="image-anime-template p-2">
              </div>
              <div class="pl-3 pt-5 div-descricao-anime-template">
                <div class="mt-5 font-anime-template">
                  <p class="text-2BFF67">Nome: <span class="descricao-anime-template">Shimoneta to Iu Gainen ga Sonzai Shinai Taikutsu na Sekai</span></p>
                  <p class="text-2BFF67">Gênero: <span class="descricao-anime-template">Comédia</span></p>
                  <p class="text-2BFF67">Estado: <span class="descricao-anime-template">Finalizado</span></p>
                  <p class="text-2BFF67">Ano de Lançamento: <span class="descricao-anime-template">2013</span></p>
                </div>
                <div class="font-anime-template">
                  <p class="text-2BFF67">Sinopse: <span class="descricao-anime-template fulljustify">Lucy é uma garota de 16 anos que quer se tornar uma maga completa, para isso, ela precisa entrar em uma guilda de magos. Um dia visitando a cidade de Harujion,ela conhece Natsu, um jovem rapaz que fica facilmente enjoado com qualquer tipo de transporte.Mas Natsu não é apenas uma criança fraca, ele é um membro de uma das maiores e infames guildas: FAIRY TAIL.</span></p>
                </div>
              </div>
            </div>
          </div>
          <div class="m-0 p-0 lateral-anime-template col">
            <p class="text-center text-light font-weight-bold display-5">Animes</p>
            <!--Cartão-->
            <div class="click-card card-anime-template mt-5">
              <div class="card custom-card">
                <img class="card-img-top" src="./img/animes-banner/onepiece.jpg" alt="" style="height: 200px; width: 100%; display: block;">
                <p class="titulo-card text-center mt-3 mb-0 text-uppercase">One Piece</p>
              </div>
            </div>
            <!--Cartão-->
            <!--Cartão-->
            <div class="click-card card-anime-template mt-5">
              <div class="card custom-card">
                <img class="card-img-top" src="./img/animes-banner/naruto.jpg" alt="" style="height: 200px; width: 100%; display: block;">
                <p class="titulo-card text-center mt-3 mb-0 text-uppercase">Naruto</p>
              </div>
            </div>
            <!--Cartão-->
          </div>
        </div>
      </div>
    </main>
    <footer id="sticky-footer" class="flex-shrink-0 py-4 text-white footer-custom">
      <div class="container text-center">
        <small>Copyright &copy; STRING Animes</small>
      </div>
    </footer>
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