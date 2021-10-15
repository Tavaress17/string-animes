<?php
class Animes_Service{
    
    private $connection;
    
    public function __construct($dbname, $host, $user, $senha) {//CONSTRUTOR PARA O BANCO DE DADOS
        try{//TRY CATCH PARA TRATAMENTO DE ERROS
            $this -> connection = new PDO("mysql:dbname=".$dbname.";host=".$host,$user,$senha);//CRIANDO O PDO DO BANCO
            
        } catch (PDOException $e) {//ERRO DO PDO
            echo "ERRO COM BANCO DE DADOS".$e->getMessage();
            exit();
            
        }catch(Exception $e){//ERRO COMUM SEM SER DO PDO
            echo "ERRO GENERICO".$e->getMessage();
            exit();
        } 
    }


    function cadastarAnimes($nomeAnime, $sinopse,$genero,$dataLancamento,$statusLancamento, $animeImagem) {
        $sql = 'insert into animes (nomeAnime, sinopse, genero, dataLancamento, statusLancamento, animeImagem) 
        values (:nomeAnime, :sinopse, :genero, :dataLancamento, :statusLancamento, :animeImagem)';
        $result = $this -> connection -> prepare ($sql);
        $result -> bindValue(':nomeAnime', $nomeAnime );
        $result -> bindValue(':sinopse', $sinopse );
        $result -> bindValue(':genero', $genero  );
        $result -> bindValue(':dataLancamento', $dataLancamento );
        $result -> bindValue(':statusLancamento', $statusLancamento );
        $result -> bindValue(':animeImagem', $animeImagem );
        $result -> execute();
    }


    //LER
    /*$sql = 'select * from animes';
    $result = $connection -> prepare ($sql);
    $result -> execute();
    var_dump($result -> fetchAll(PDO::FETCH_OBJ));*/
    
    public function carregarCards(){
        $sql = $this->connection->prepare( "SELECT nomeAnime, sinopse, animeImagem FROM animes;");//PEGA TODOS OS VIDEOS
        $sql->execute();

        if ($sql->rowCount() > 0) {//Enquanto tiverem linhas na tabela
            foreach ($sql as $res) {
                $nomeAnime = $res['nomeAnime'];
                $sinopse = $res['sinopse'];
                $animeImagem = $res['animeImagem'];
                echo "<div class='col-md-4 mb-5'>
                        <div class='card bg-black border-853bd4 custom-card cursorh-pointer'>
                        <img class='card-img' src='./img/animes-banner/$animeImagem.jpg' alt='' style='height: 300px; width: 100%; display: block;'>
                        <p class='font-weight-bold text-light display-6 text-center mt-3 mb-0 text-uppercase'>$nomeAnime</p>
                            <div class='p-2'>
                                <div class='text-light card-sinopse mb-3'>
                                    <p class='text-justify'>$sinopse</p>
                                    <a href=''>Mais...</a>
                                </div>
                                <div class='float-right'>
                                    <div class='btn-group'>
                                        <button type='button' class='btn btn-outline-light btn-editar'>Editar</button>
                                        <button type='button' class='btn btn-outline-light btn-excluir'>Excluir</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>";
            }
        }
    }
}