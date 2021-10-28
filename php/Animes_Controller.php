<?php
//CONEXÃO
session_start();
require_once '../php/Animes_Service.php';
$anime_service = new Animes_Service("string_animes", "localhost", "root", "");


if(isset($_POST['btn-cadastro-anime'])) {// VERIFICA SE A PESSOA CLICKOU PARA CADASTRAR UM ANIME
    //RECEBE OS VALORES DOS FORMULÁRIOS E ADICIONA-OS EM VARIAVEIS
    $nomeAnime = addslashes($_POST['nomeAnime']);
    $sinopse = addslashes ($_POST['sinopse']);
    $genero = addslashes ($_POST['genero']);
    $dataLancamento = addslashes ($_POST['dataLancamento']);
    $statusLancamento = addslashes ($_POST['statusLancamento']);
    $animeImagem = addslashes($_POST['animeImagem']);
    $imagem = $_FILES['imagem'];
    
    
    //VERIFICA SE TODOS OS CAMPOS FORAM PREENCHIDOS
    if (!empty($nomeAnime) && !empty($sinopse) && !empty($genero) && !empty($dataLancamento) && !empty($statusLancamento) && !empty($animeImagem)&& !empty($imagem)) {
       $resp = $anime_service->buscarAnime($nomeAnime);
        if(!empty($resp)){
            echo " ANIME JÁ CADASTRADO ";
        }else{
            $largura = 1000;
            $altura = 1000;
            $dimensoes = getimagesize($imagem["tmp_name"]);
                
            if(!preg_match("/^image\/(jpeg|png)$/", $imagem["type"])){//VERIFICA SE O ARQUIVO É UMA IMAGEM
            echo "Isso não é uma imagem.";
            }else{
                // VERIFICA SE AS DIMENSÕES SÃO ACEITAS
                if($dimensoes[0] > $largura || $dimensoes[1] > $altura) {
                    echo "A imagem deve possuir largura máxima de ".$largura.", altura máxima de ". $altura;
                }else{
                    preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $imagem["name"], $ext);//PEGA A EXTENSÃO DA IMAGEM
                    $nome_imagem = $animeImagem.time().".".$ext[1];//GERA O NOME DA IMAGEM
                    $caminho_imagem = "../img/animes-banner/" . $nome_imagem;
                    move_uploaded_file($imagem["tmp_name"], $caminho_imagem);//ENVIA A IMAGEM PARA O SEU LOCAL DE ARMAZENAMENTO

                    $anime_service->cadastarAnimes($nomeAnime, $sinopse, $genero, $dataLancamento, $statusLancamento, $nome_imagem);
                    header('Location: ../index.php');
                }
            } 
        }
        
    }else{
        echo "PREENCHA TODOS OS DADOS";
    }
}

    //VERIFICA SE CLICOU NO BOTÃO DE ATUALIZAÇÃO        
if(isset($_POST['btn-editar-anime'])){
    $nomeAnime = addslashes($_POST['nomeAnime']);
    $sinopse = addslashes ($_POST['sinopse']);
    $genero = addslashes ($_POST['genero']);
    $dataLancamento = addslashes ($_POST['dataLancamento']);
    $statusLancamento = addslashes ($_POST['statusLancamento']);
    $id_anime = addslashes ($_POST['id_atualizar']);
    $imagem = $_FILES['imagem'];

    
    if(!empty($nomeAnime) && !empty($sinopse) && !empty($genero) && !empty($dataLancamento) && !empty($statusLancamento) && !empty($imagem)) {
        $resp = $anime_service->buscarAnime($nomeAnime);
        if(!empty($resp) && $resp['idAnime'] != $id_anime){
            echo "ANIME JÁ CADASTRADO, NOME INVÁLIDO";
        }else{
            if(empty($imagem["tmp_name"])){
                $res = $anime_service->buscarAnimeById($id_anime);
                $nome_imagem = $res['animeImagem'];
                $anime_service->atualizacaoDados($nomeAnime, $sinopse, $genero, $dataLancamento, $statusLancamento, $id_anime, $nome_imagem);
                header('Location: ../index.php');
            }else{
                $largura = 1000;
                $altura = 1000;
                $dimensoes = getimagesize($imagem["tmp_name"]);
                
                if(!preg_match("/^image\/(jpeg|png)$/", $imagem["type"])){//VERIFICA SE O ARQUIVO É UMA IMAGEM
                   echo "Isso não é uma imagem.";
                }else{
                    // VERIFICA SE AS DIMENSÕES SÃO ACEITAS
                    if($dimensoes[0] > $largura || $dimensoes[1] > $altura) {
                        echo "A imagem deve possuir largura máxima de ".$largura.", altura máxima de ". $altura;
                    }else{
                        preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $imagem["name"], $ext);//PEGA A EXTENSÃO DA IMAGEM
                        $nome_imagem = $resp['animeImagem'].time().".".$ext[1];//GERA O NOME DA IMAGEM
                        $caminho_imagem = "../img/animes-banner/" . $nome_imagem;
                        move_uploaded_file($imagem["tmp_name"], $caminho_imagem);//ENVIA A IMAGEM PARA O SEU LOCAL DE ARMAZENAMENTO

                        $anime_service->atualizacaoDados($nomeAnime, $sinopse, $genero, $dataLancamento, $statusLancamento, $id_anime, $nome_imagem);
                        header('Location: ../index.php');
                    }
                } 
            }
            
        }
    }    
}




