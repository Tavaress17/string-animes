<?php

class User_Service{
    
    private $pdo;
    
    public function __construct($dbname, $host, $user, $senha) {//CONSTRUTOR PARA O BANCO DE DADOS
        try {//TRY CATCH PARA TRATAMENTO DE ERROS
            $this->pdo = new PDO("mysql:dbname=" . $dbname . ";host=" . $host, $user, $senha); //CRIANDO O PDO DO BANCO
        } catch (PDOException $e) {//ERRO DO PDO
            echo "ERRO COM BANCO DE DADOS" . $e->getMessage();
            exit();
        } catch (Exception $e) {//ERRO COMUM SEM SER DO PDO
            echo "ERRO GENERICO" . $e->getMessage();
            exit();
        }
    }
    
    public function buscarDados(){//FUNCAO PARA BUSCAR OS DADOS E COLOCAR NA TABELA DA DIREITA
        $res = array();// CRIADO COMO ARRAY PARA EVITAR ERROS COM BANCO DE DADOS VAZIO
        
        $cmd = $this->pdo->query("SELECT * FROM users");//PEGA OS VALORES DO BANCO
        $res = $cmd->fetchAll(PDO::FETCH_ASSOC);//USADO PARA RECEBER OS VALORES DO BANCO COMO ARRAY
        
        return $res;//RETORNA O CADASTROS PARA QUEM CHAMAR O METODO
    }
    
    public function buscarUser($email){
        $cmd = $this->pdo->prepare("SELECT * FROM users WHERE email = :e");
        $cmd->bindValue(":e", $email);
        $cmd->execute();
        $res = $cmd->fetch(PDO::FETCH_ASSOC);
        return $res;
    }
    
    public function buscarUserById($id){
        $cmd = $this->pdo->prepare("SELECT * FROM users WHERE id = :id");
        $cmd->bindValue(":id", $id);
        $cmd->execute();
        $res = $cmd->fetch(PDO::FETCH_ASSOC);
        return $res;
    }
    
    public function login($email, $senha){//EU ACHO QUE AQUI É ONDE MORA O PROBLEMA, MAS JÁ TESTEI TODAS AS MINHAS IDEIAS E NADA FUNCIONA
        $cmd = $this->pdo->prepare("SELECT * FROM users WHERE email = :e AND senha = :s");
        $cmd->bindValue(":e", $email);
        $cmd->bindValue(":s", $senha);
        $cmd->execute();
        $aux = array();
        $aux = $cmd->fetch(PDO::FETCH_ASSOC);//TRANSFORMA O BANCO EM UM ARRAY
        if($cmd->rowCount() == 1){// VERIFICA SE NO BANCO EXISTE UM LOGIN E SENHA ATRELADOS IGUAIS AO PASSADO PELO USUARIO
            session_unset();
            $_SESSION ['logado'] = true; 
            $_SESSION['user'] = $aux['id'];// SETA A SESSÃO
            $_SESSION['adm'] = $aux['adm'];//SETA A SESSÃO, MAS SEMPRE FICA VAZIO(eu acho)
            header("Location: ../perfil_template.php"); 
        }else{
            echo "Login/Senha incorreto";
            return false;
        }
            
    }
    
    public function cadastroUsuario($nome, $senha, $data_nasc,$email, $adm){   
        $cmd = $this->pdo->prepare("INSERT INTO users VALUES (default, :n, :e, MD5(:s), :dn, :adm, '');");
        $cmd->bindValue(":n", $nome);
        $cmd->bindValue(":e", $email);
        $cmd->bindValue(":s", $senha);
        $cmd->bindValue(":dn", $data_nasc);
        $cmd->bindValue(":adm", $adm);
        $cmd->execute();
    }
    
    public function atualizacaoDados($nome,$data_nasc,$email, $id, $nome_imagem){   
        $cmd = $this->pdo->prepare("UPDATE users SET nome = :n, email = :e, data_nasc = :dn, img_user = :img WHERE id = :id");
        $cmd->bindValue(":n", $nome);
        $cmd->bindValue(":e", $email);
        $cmd->bindValue(":dn", $data_nasc);
        $cmd->bindValue(":img", $nome_imagem);
        $cmd->bindValue(":id", $id);
        $cmd->execute();
    }
    
    public function apagarConta($id) {
        $cmd = $this->pdo->prepare("DELETE FROM users WHERE id = :id");//QUERY DO MYSLQ PARA EXCLUSÃO DE INSERÇÕES
        $cmd->bindValue(":id",$id);
        $cmd->execute();
    }
    
    public function salvarComentario($mensagem, $user_id, $id_anime){
        $cmd = $this->pdo->prepare("INSERT INTO comentarios VALUES(default, :m, :u, :i);");
        $cmd->bindValue(":m", $mensagem);
        $cmd->bindValue(":u", $user_id);
        $cmd->bindValue(":i", $id_anime);
        $cmd->execute();
    }
    public function buscarComentario($anime_id){
        $cmd = $this->pdo->prepare("SELECT * FROM comentarios WHERE anime_id = :id;");
        $cmd->bindValue(":id", $anime_id);
        $cmd->execute();

        if ($cmd->rowCount() > 0) {//Enquanto tiverem linhas na tabela
            foreach ($cmd as $res) {
                $mensagem = $res['mensagem'];
                $id = $res['user_id'];
                $sql = $this->pdo->prepare("SELECT nome, img_user FROM users WHERE id = $id");
                $sql->execute();
                $resp = $sql->fetch(PDO::FETCH_ASSOC);
                $img_user = $resp['img_user'];
                $nome_user = $resp['nome'];
                
                echo "
                    <div class='borderbottom-purple'></div>
                    <div class='container container-comentario-template pt-4 pb-5'>
                        <div class='grid-comentario pt-4'>";
                            if(empty($img_user)){
                                echo "<img src='./img/img_profile/padrao.jpg' alt=''
                                class='image-comentario-template border-purple p-2' style='object-fit: cover;'>";
                            }else{
                                echo "<img src='./img/img_profile/$img_user' alt=''
                                class='image-comentario-template border-purple p-2' style='object-fit: cover;'>";
                            }
                        echo "
                        </div>
                        <div class='comentario-descricao font-anime-template pl-3 py-5'>
                            <p class='text-purple'>$nome_user<span class='pl-3 text-green span-horario'>13:00</span></p>
                            <p class='text-light fulljustify'>
                                $mensagem
                            </p> 
                        </div>     
                    </div>
                ";
            }
        }
    }
}


