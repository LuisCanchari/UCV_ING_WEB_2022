create database db_mvc;
use db_mvc;

create table monedas(
	id int auto_increment,
	codigo varchar(5),
	nombre varchar(50),
	pais varchar(50),
	factor decimal(8,2),
	primary key(id)
);

INSERT INTO monedas (codigo, nombre, pais, factor) VALUES ('PEN', 'Sol', 'Peru', 3.8);
INSERT INTO monedas (codigo, nombre, pais, factor) VALUES ('USD', 'Dolar', 'EE-UU', 1);

