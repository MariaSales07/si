CREATE DATABASE db_imobiliaria;

USE db_imobiliaria;

CREATE TABLE imoveis (
    id_imoveis INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(255) NOT NULL,
    ds_imoveis TEXT NOT NULL,
    nm_endereco VARCHAR(255) NOT NULL,
    vl_imoveis DECIMAL(10,2) NOT NULL,
    nr_area DECIMAL(10,2),
    nr_quartos INT,
    nr_banheiros INT,
    nr_garagem INT,
    en_status ENUM('disponível', 'reservado', 'vendido', 'alugado') NOT NULL
);
