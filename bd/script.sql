CREATE DATABASE dbpro;

USE dbpro;

CREATE TABLE pro(
    id INT(5) PRIMARY KEY AUTO_INCREMENT,
    nompro VARCHAR(255),
    despro TEXT,
    prcpro BIGINT(11),
    imgpro VARCHAR(255)
);

CREATE TABLE ubi(
    codubi INT(5) PRIMARY KEY AUTO_INCREMENT,
    nomubi VARCHAR(100),
    depubi INT(5)
);

CREATE TABLE prv(
    idprv INT(5) PRIMARY KEY AUTO_INCREMENT,
    nit VARCHAR(12),
    nomprv VARCHAR(100),
    razsc VARCHAR(20),
    dirprv VARCHAR(50),
    telprv VARCHAR(10),
    codubi INT(5),
    corprv VARCHAR(50)
);

ALTER TABLE prv ADD KEY fkprvubi(codubi);

ALTER TABLE prv ADD CONSTRAINT fkprvubi FOREIGN KEY (codubi) REFERENCES ubi(codubi);