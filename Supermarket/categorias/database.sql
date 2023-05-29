CREATE DATABASE facturacion

CREATE TABLE categorias(
    categoria_id INT primary key AUTO_INCREMENT,
    categoriaNombre VARCHAR (50) NOT NULL,
    descripcion VARCHAR (50),
    imagen VARCHAR (1000)
);