<?php
//CONEXÃO

try {
    $connection = new PDO('mysql:host=localhost;port=3306;dbname=string_animes', 'root', '');
} catch (Exception $error) {
    echo "Ocorreu o seguinte erro: {$error -> getMessage()}";
}

//INSERIR
$sql = 'insert into animes (nomeAnime, sinopse, genero, dataLancamento, statusLancamento, animeImagem) 
    values (:nomeAnime, :sinopse, :genero, :dataLancamento, :statusLancamento, :animeImagem)';
$result = $connection -> prepare ($sql);
$nomeAnime = $_POST['nomeAnime'];
$sinopse = $_POST['sinopse'];
$genero = $_POST['genero'];
$dataLancamento = $_POST['dataLancamento'];
$statusLancamento = $_POST['statusLancamento'];
$animeImagem = $_POST['animeImagem'];
$result -> bindValue(':nomeAnime', $nomeAnime );
$result -> bindValue(':sinopse', $sinopse );
$result -> bindValue(':genero', $genero  );
$result -> bindValue(':dataLancamento', $dataLancamento );
$result -> bindValue(':statusLancamento', $statusLancamento );
$result -> bindValue(':animeImagem', $animeImagem );
$result -> execute();

//LER
$sql = 'select * from animes';
$result = $connection -> prepare ($sql);
$result -> execute();
var_dump($result -> fetchAll(PDO::FETCH_OBJ));
