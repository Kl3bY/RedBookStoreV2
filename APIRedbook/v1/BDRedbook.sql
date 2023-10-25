DROP DATABASE IF EXISTS BDRedbookstore;
CREATE DATABASE BDRedbookstore;

USE BDRedbookstore;

CREATE TABLE livro(
cod TINYINT NOT NULL,
nome varchar(120) NOT NULL,
genero varchar(30) NOT NULL,
desclivro varchar(300) NOT NULL,
rate INT NOT NULL,
preco DOUBLE NOT NULL,
PRIMARY KEY(cod)
);


INSERT INTO livro (nome,genero,desclivro,rate,preco) VALUES
('Relatos De Um Gato Viajante','Romance','O gato Nana está viajando pelo Japão. Ele não sabe muito bem para onde está indo ou por que,
	mas ele está sentado no banco da van prata de Satoru, seu dono. Lado a lado,
	eles cruzam o país para visitar velhos amigos.',5,47.47);