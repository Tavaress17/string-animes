# Trabalho Web 4° Bimestre
Site feito para o nosso 4º bimestre na matéria "Lingua de Programação Web", utilizando CRUD com PDO.

### Grupo:
* [Carlos Eduardo do Amaral](https://github.com/IKeepProgramming)
* [Cauê Pacheco Palma](https://github.com/Tsuki25)
* Eduardo Ferreira Silva
* [Luan Tavares de Lima](https://github.com/Tavaress17)
* [Rafael Aparecido Marinho](https://github.com/fael890)

### Apresentação:
O projeto é a baseado em um site de animes no qual o usuário poderá adicionar os animes que quiser e também poderá fazer um cadastro ou login para acessar seu perfil.

### Instalação:
Será necessário um banco de dados para que as funções do site funcionem, nesse caso utilizamos o [MySQL Workbench](https://www.mysql.com) para criação do banco e utilizamos o seguinte script para criá-lo:

~~~sql
CREATE DATABASE IF NOT EXISTS string_animes;/*Criando o banco de dados*/

USE string_animes;/*Usar o banco de dados criado*/

/*Criação da tabela*/
CREATE TABLE IF NOT EXISTS users(
    id int primary key auto_increment,
    nome varchar(50) not null,
    email varchar(100) not null,
    senha varchar(32) not null,
    data_nasc date not null,
    adm boolean not null,
    img_user varchar(120)
)default charset = utf8;

CREATE TABLE IF NOT EXISTS animes(
    idAnime int primary key auto_increment,
    nomeAnime varchar(255) not null,
    sinopse varchar(999) not null,
    genero varchar(60) not null,
    dataLancamento int not null,
    statusLancamento varchar (60) not null,
    animeImagem varchar (255) not null
)default charset = utf8;

CREATE TABLE IF NOT EXISTS comentarios(
    idComentario int(11) primary key auto_increment,
    mensagem varchar(45) ,
    user_id int(11),
    anime_id int(11),
    constraint comentarios_ibfk_1 foreign key(user_id) references users(id),
    constraint comentarios_ibfk_2 foreign key(anime_id) references animes(idAnime)
)default charset = utf8;

INSERT INTO users VALUES (default,"Admin","admin@stranimes.com", md5(5678),  "2021-12-03", true, ""); /*Criação padrão de um administrador*/

/*Leitura da tabela*/

SELECT * FROM users;
~~~
