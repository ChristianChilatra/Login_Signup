create database tour;
use tour;

create table usuario (
    doc INT(10) PRIMARY KEY,
    nom VARCHAR (30) NOT NULL,
    edad INT(2) NOT NULL,
    mail VARCHAR (50) NOT NULL,
    fec_nac DATE NOT NULL,
    dest VARCHAR(50) NOT NULL,
    acomp INT(2) NOT NULL,
    arline VARCHAR(10) NOT NULL    
)

create table usuario (
    id INT(10) PRIMARY KEY,
    user VARCHAR (30) NOT NULL,
    pass INT(250) NOT NULL,
)
