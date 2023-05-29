CREATE DATABASE facturacion

CREATE TABLE empleados(
    empleado_id INT primary key AUTO_INCREMENT,
    nombre VARCHAR (50) NOT NULL,
    celular INT (50),
    direccion TEXT (50),
    imagen VARCHAR (1000)
);