CREATE DATABASE facturacion

CREATE TABLE categorias(
    id INT primary key AUTO_INCREMENT,
    categoriaNombre VARCHAR (50) NOT NULL,
    descripcion VARCHAR (50),
    imagen VARBINARY(50)
);