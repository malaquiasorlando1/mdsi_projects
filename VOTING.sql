CREATE DATABASE voting;

USE voting;

CREATE TABLE eleitores (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(5000) NOT NULL,
    email VARCHAR(2000) NOT NULL,
    nif VARCHAR(4000) NOT NULL,
    data_nascimento DATE NOT NULL,
    num_eleitor VARCHAR(1000) NOT NULL,
    senha VARCHAR(3000) NOT NULL,
    UNIQUE (nome),
    logged_in TINYINT(1) DEFAULT 0
);

CREATE TABLE administrador (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario VARCHAR(200) NOT NULL,
    senha VARCHAR(200) NOT NULL
);

CREATE TABLE votos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(5000) NOT NULL,
    numero_votos INT NOT NULL DEFAULT 0,
    UNIQUE KEY (nome)
);

CREATE TABLE codigos_validacao (
    id INT AUTO_INCREMENT PRIMARY KEY,
    codigo VARCHAR(500) NOT NULL,
    usado INT DEFAULT 0,
	nome_pessoa VARCHAR(1000)
);

INSERT INTO administrador (usuario, senha) VALUES ("Admin", "123456789");

INSERT INTO codigos_validacao (codigo) VALUES 
("MPLA1"), 
("UNITA2"), 
("FNLA3"), 
("PRS4"),
("PHA5");

UPDATE codigos_validacao
SET nome_pessoa = CASE codigo
    WHEN 'MPLA1' THEN 'João Lourenço'
    WHEN 'UNITA2' THEN 'Adalberto Costa Júnior'
    WHEN 'FNLA3' THEN 'Nimi A Simbi'
    WHEN 'PRS4' THEN 'Benedito Daniel'
    WHEN 'PHA5' THEN 'Florbela Malaquias'
    ELSE 'Nome Desconhecido'
END;

SELECT * FROM eleitores;

SELECT * FROM administrador;

SELECT * FROM votos;

SELECT * FROM codigos_validacao;

/*
SET SQL_SAFE_UPDATES = 0;
SET SQL_SAFE_UPDATES = 1;
