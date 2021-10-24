<?php
class Animes_Service{
    
    private $pdo;
    
    public function __construct($dbname, $host, $user, $senha) {//CONSTRUTOR PARA O BANCO DE DADOS
        try{//TRY CATCH PARA TRATAMENTO DE ERROS
            $this ->pdo= new PDO("mysql:dbname=".$dbname.";host=".$host,$user,$senha);//CRIANDO O PDO DO BANCO
            
        } catch (PDOException $e) {//ERRO DO PDO
            echo "ERRO COM BANCO DE DADOS".$e->getMessage();
            exit();
            
        }catch(Exception $e){//ERRO COMUM SEM SER DO PDO
            echo "ERRO GENERICO".$e->getMessage();
            exit();
        } 
    }
    
    public function buscarAnime($nomeAnime){
        $cmd = $this->pdo->prepare("SELECT * FROM animes WHERE nomeAnime, = :an");
        $cmd->bindValue(":an", $nomeAnime);
        $cmd->execute();
        $res = $cmd->fetch(PDO::FETCH_ASSOC);
        return $res;
    }
    
    public function buscarAnimeById($id){
        $cmd = $this->pdo->prepare("SELECT * FROM animes WHERE idAnime = :id");
        $cmd->bindValue(":id", $id);
        $cmd->execute();
        $res = $cmd->fetch(PDO::FETCH_ASSOC);
        return $res;
    }


    function cadastarAnimes($nomeAnime, $sinopse,$genero,$dataLancamento,$statusLancamento, $animeImagem) {
        $cmd = $this->pdo->prepare ('INSERT INTO animes (nomeAnime, sinopse, genero, dataLancamento, statusLancamento, animeImagem) 
        VALUES (:nomeAnime, :sinopse, :genero, :dataLancamento, :statusLancamento, :animeImagem)');
        $cmd -> bindValue(':nomeAnime', $nomeAnime );
        $cmd -> bindValue(':sinopse', $sinopse );
        $cmd -> bindValue(':genero', $genero  );
        $cmd -> bindValue(':dataLancamento', $dataLancamento );
        $cmd -> bindValue(':statusLancamento', $statusLancamento );
        $cmd -> bindValue(':animeImagem', $animeImagem );
        $cmd -> execute();
    }
    
    public function atualizacaoDados($nomeAnime, $sinopse,$genero,$dataLancamento,$statusLancamento, $id, $animeImagem){
        $cmd = $this->pdo->prepare("UPDATE animes SET nomeAnime = :n, sinopse = :s, genero = :g, dataLancamento= :dl, statusLancamento = :sl, animeImagem = :an WHERE idAnime = :id");
        $cmd -> bindValue(':n', $nomeAnime );
        $cmd -> bindValue(':s', $sinopse );
        $cmd -> bindValue(':g', $genero  );
        $cmd -> bindValue(':dl', $dataLancamento );
        $cmd -> bindValue(':sl', $statusLancamento );
        $cmd->bindValue(":id", $id);
        $cmd -> bindValue(':an', $animeImagem );
        $cmd->execute();
    }
    
    public function carregarCards($reg_pag, $pg){
        $inicio = ($pg - 1) * $reg_pag;
        
        $cmd = $this->pdo->prepare( "SELECT idAnime, nomeAnime, sinopse, animeImagem FROM animes LIMIT $inicio,$reg_pag;");//PEGA TODOS OS VIDEOS
        $cmd->execute();

        if ($cmd->rowCount() > 0) {//Enquanto tiverem linhas na tabela
            foreach ($cmd as $res) {
                $id_anime = $res['idAnime'];
                $nomeAnime = $res['nomeAnime'];
                $sinopse = $res['sinopse'];
                $animeImagem = $res['animeImagem'];
                echo "
                <div class='card bg-black border-purple pb-4 cursorh-pointer'>
                <img src='img/animes-banner/$animeImagem' class='anime-image' alt=''>
                <div class='conteudo'>
                    <h2 class='text-center text-light my-2'>$nomeAnime</h2>
                    <div class='card-sinopse'>
                        <p class='text-justify text-light'>
                           $sinopse
                        </p>
                        <a href=''> Mais... </a>
                    </div>
                    <div class='float-right mt-3'>
                        <div class='btn-group'>
                            <button type='button' class='btn btn-outline-light btn-editar'><a href='index.php?id_anime=$id_anime' onclick='document.getElementById('adicionarAnime').style.display='none';document.getElementById('formAnime').style.display='block';'>Editar</a></button>
                            <button type='button' class='btn btn-outline-light btn-excluir' ><a href='index.php?id_excluir=$id_anime'>Excluir</a></button>
                        </div>
                    </div>
                </div>
            </div>";
            }
        }
        
        $total = $this->pdo->prepare("SELECT * FROM animes;");
        $total->execute();
        $tp = $total->rowCount() / $reg_pag;
        $tp = ceil($tp);

        echo "<div class='paginacao'>";
        $anterior = $pg - 1;
        $proximo = $pg + 1;
        if ($pg == $tp && $anterior == 0) {
            echo "<a href='?pagina=$anterior' style='pointer-events: none; opacity: 0.5;'><img src='img/back.png' style='widht:50px; height:50px;'></a>"
            . " | " .
            "<a href='?pagina=$proximo' style='pointer-events: none; opacity: 0.5;'><img src='img/next.png' style='widht:50px; height:50px;'></a>" .
            "</div>";
        } else if ($pg == $tp) {
            echo "<a href='?pagina=$anterior'><img src='img/back.png' style='widht:50px; height:50px;'></a>"
            . " | " .
            "<a href='?pagina=$proximo' style='pointer-events: none; opacity: 0.5;'><img src='img/next.png' style='widht:50px; height:50px;'></a>" .
            "</div>";
        } else if ($anterior == 0) {
            echo "<a href='?pagina=$anterior' style='pointer-events: none; opacity: 0.5;'><img src='img/back.png' style='widht:50px; height:50px;'></a>"
            . " | " .
            "<a href='?pagina=$proximo' ><img src='img/next.png' style='widht:50px; height:50px;'></a>" .
            "</div>";
        } else {
            echo "<a href='?pagina=$anterior'><img src='img/back.png' style='widht:50px; height:50px;'></a>"
            . " | " .
            "<a href='?pagina=$proximo'><img src='img/next.png' style='widht:50px; height:50px;'></a>" .
            "</div>";
        }
    }
}