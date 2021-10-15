<?php
//CONEXÃO

require_once '../php/Animes_Service.php';
$a_service = new Animes_Service("string_animes", "localhost", "root", "");

if (isset($_POST['nomeAnime'])) {// VERIFICA SE A PESSOA CLICKOU PARA ADICIONAR
    //RECEBE OS VALORES DOS FORMULÁRIOS E ADICIONA-OS EM VARIAVEIS
    $nomeAnime = $_POST['nomeAnime'];
    $sinopse = $_POST['sinopse'];
    $genero = $_POST['genero'];
    $dataLancamento = $_POST['dataLancamento'];
    $statusLancamento = $_POST['statusLancamento'];
    $animeImagem = $_POST['animeImagem'];
    //VERIFICA SE TODOS OS CAMPOS FORAM PREENCHIDOS
    if (!empty($nomeAnime) && !empty($sinopse) && !empty($genero) && !empty($dataLancamento) && !empty($statusLancamento) && !empty($animeImagem)) {
       $a_service->cadastarAnimes($nomeAnime, $sinopse, $genero, $dataLancamento, $statusLancamento, $animeImagem);
        header("Location: ../index.php");
    }
}




