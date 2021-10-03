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
CREATE TABLE IF NOT EXISTS animes(
idAnime int primary key auto_increment,
nomeAnime varchar(255) not null,
sinopse varchar(400) not null,
genero varchar(60) not null,
dataLancamento int not null,
statusLancamento varchar (60) not null,
animeImagem varchar (255) not null
)default charset = utf8;

/*Inserção de teste na tabela.*/
INSERT INTO animes (nomeAnime, sinopse, genero, dataLancamento, statusLancamento, animeImagem) VALUES 
(
'Naruto',
'Naruto é um jovem órfão habitante da Vila da Folha que sonha se tornar o quinto Hokage, 
o maior guerreiro e governante da vila. Agora Naruto vai contar com a ajuda dos colegas Sakura e Sasuke e do professor dos três, 
Kakashi Hatake, para perseguir seu sonho e deter os ninjas que planejam fazer mal á sua cidade.',
'Shounen',
'2002',
'Concluido',
'naruto'
);

/*Leitura da tabela*/
SELECT * FROM animes;
~~~
