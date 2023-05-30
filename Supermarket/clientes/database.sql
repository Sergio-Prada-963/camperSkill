CREATE DATABASE facturacion

CREATE TABLE clientes(
    cliente_id INT primary key AUTO_INCREMENT,
    nombre VARCHAR (50) NOT NULL,
    celular INT (50),
    compania TEXT (50)
);