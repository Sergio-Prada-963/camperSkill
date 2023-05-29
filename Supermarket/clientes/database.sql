CREATE DATABASE facturacion

CREATE TABLE clientes(
    cliente_id INT primary key AUTO_INCREMENT,
    nombre VARCHAR (50) NOT NULL,
    celular INT (15),
    compania TEXT (20)
);