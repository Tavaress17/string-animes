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
        $cmd = $this->pdo->prepare("SELECT * FROM animes WHERE nomeAnime = :an");
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
    
    public function excluirAnime($id_anime){
        $cmd = $this->pdo->prepare("DELETE FROM animes WHERE idAnime = :id");//QUERY DO MYSLQ PARA EXCLUSÃO DE INSERÇÕES
        $cmd->bindValue(":id",$id_anime);
        $cmd->execute();
    }
    
    public function recomendados($anime_atual){
        $cmd = $this->pdo->prepare("SELECT DISTINCT idAnime, nomeAnime, animeImagem FROM animes WHERE NOT idAnime = $anime_atual ORDER BY RAND() LIMIT 3");
        $cmd->execute();
        
        if ($cmd->rowCount() > 0) {//Enquanto tiverem linhas na tabela
            foreach ($cmd as $res) {
                $id_anime = $res['idAnime'];
                $nomeAnime = $res['nomeAnime'];
                $animeImagem = $res['animeImagem'];
                echo "
                <div class='cardRecomendados p-4 m-2 border-purple'>
                    <a href='animes_template.php?anime=$id_anime'>
                        <img src='./img/animes-banner/$animeImagem' alt='$nomeAnime'class='image-anime-template p-2'>
                    </a>
                    <p class='text-center text-light font-weight-bold display-5 text-uppercase'>$nomeAnime</p>
                </div>";
            }
        }
        
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
                    <img src='img/animes-banner/$animeImagem' class='anime-image'>
                    <div class='conteudo pb-5'>
                        <h2 class='text-center text-light my-2'>$nomeAnime</h2>
                        <div class='card-sinopse'>
                            <p class='text-justify text-light'>
                                $sinopse
                            </p>
                            <a href='animes_template.php?anime=$id_anime'> Mais... </a>
                        </div>
                        <div id='edit_excluir' class='float-right mt-3'>
                            <div class='btn-group'>
                                <button type='button' class='btn btn-outline-light btn-editar'><a href='index.php?id_anime=$id_anime' onclick='document.getElementById('adicionarAnime').style.display='none';document.getElementById('formAnime').style.display='block';'>Editar</a></button>
                                <button type='button' class='btn btn-outline-light btn-excluir' ><a href='index.php?id_excluir=$id_anime'>Excluir</a></button>
                            </div>
                        </div>
                    </div>
                </div>";
            }
        }
    }

    public function paginacao($reg_pag, $pg){
        $total = $this->pdo->prepare("SELECT * FROM animes;");
        $total->execute();
        $tp = $total->rowCount() / $reg_pag;
        $tp = ceil($tp);
        
        echo "<div class='d-flex justify-content-center mb-4'>";
        $anterior = $pg - 1;
        $proximo = $pg + 1;
        if ($pg == $tp && $anterior == 0) {
            echo "<a href='?pagina=$anterior' style='pointer-events: none; opacity: 0.5;'><svg class='paginacao-stroke' xmlns='http://www.w3.org/2000/svg' width='50' height='50' viewBox='0 0 24 24' fill='none' stroke='#853bd4' stroke-width='3' stroke-linecap='round' stroke-linejoin='round'><path d='M19 12H6M12 5l-7 7 7 7'/></svg></a>"
            .
            "<a href='?pagina=$proximo' style='pointer-events: none; opacity: 0.5;'><svg class='paginacao-stroke' xmlns='http://www.w3.org/2000/svg' width='50' height='50' viewBox='0 0 24 24' fill='none' stroke='#853bd4' stroke-width='3' stroke-linecap='round' stroke-linejoin='round'><path d='M5 12h13M12 5l7 7-7 7'/></svg></a>" .
            "</div>";
        } else if ($pg == $tp) {
            echo "<a href='?pagina=$anterior'><svg class='paginacao-stroke' xmlns='http://www.w3.org/2000/svg' width='50' height='50' viewBox='0 0 24 24' fill='none' stroke='#853bd4' stroke-width='3' stroke-linecap='round' stroke-linejoin='round'><path d='M19 12H6M12 5l-7 7 7 7'/></svg></a>"
            .
            "<a href='?pagina=$proximo' style='pointer-events: none; opacity: 0.5;'><svg class='paginacao-stroke' xmlns='http://www.w3.org/2000/svg' width='50' height='50' viewBox='0 0 24 24' fill='none' stroke='#853bd4' stroke-width='3' stroke-linecap='round' stroke-linejoin='round'><path d='M5 12h13M12 5l7 7-7 7'/></svg></a>" .
            "</div>";
        } else if ($anterior == 0) {
            echo "<a href='?pagina=$anterior' style='pointer-events: none; opacity: 0.5;'><svg class='paginacao-stroke' xmlns='http://www.w3.org/2000/svg' width='50' height='50' viewBox='0 0 24 24' fill='none' stroke='#853bd4' stroke-width='3' stroke-linecap='round' stroke-linejoin='round'><path d='M19 12H6M12 5l-7 7 7 7'/></svg></a>"
            .
            "<a href='?pagina=$proximo'><svg class='paginacao-stroke' xmlns='http://www.w3.org/2000/svg' width='50' height='50' viewBox='0 0 24 24' fill='none' stroke='#853bd4' stroke-width='3' stroke-linecap='round' stroke-linejoin='round'><path d='M5 12h13M12 5l7 7-7 7'/></svg></a>" .
            "</div>";
        } else {
            echo "<a href='?pagina=$anterior'><svg class='paginacao-stroke' xmlns='http://www.w3.org/2000/svg' width='50' height='50' viewBox='0 0 24 24' fill='none' stroke='#853bd4' stroke-width='3' stroke-linecap='round' stroke-linejoin='round'><path d='M19 12H6M12 5l-7 7 7 7'/></svg></a>"
            .
            "<a href='?pagina=$proximo'><svg class='paginacao-stroke' xmlns='http://www.w3.org/2000/svg' width='50' height='50' viewBox='0 0 24 24' fill='none' stroke='#853bd4' stroke-width='3' stroke-linecap='round' stroke-linejoin='round'><path d='M5 12h13M12 5l7 7-7 7'/></svg></a>" .
            "</div>";
        }
    }
}