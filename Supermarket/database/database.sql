CREATE DATABASE facturacion

-- Categorias---------------------
CREATE TABLE categorias(
    categoria_id INT primary key AUTO_INCREMENT,
    categoriaNombre VARCHAR (50) NOT NULL,
    descripcion VARCHAR (50),
    imagen VARCHAR (1000)
);


-- Clientes-----------------
CREATE TABLE clientes(
    cliente_id INT primary key AUTO_INCREMENT,
    nombre VARCHAR (50) NOT NULL,
    celular INT (50),
    compania TEXT (50)
);

-- Empleados------------------
CREATE TABLE empleados(
    empleado_id INT primary key AUTO_INCREMENT,
    nombre VARCHAR (50) NOT NULL,
    celular INT (50),
    direccion TEXT (50),
    imagen VARCHAR (1000)
);

-- Facturas-------------------
CREATE TABLE facturas(
    factura_id INT primary key AUTO_INCREMENT,
    empleado_id INT (20),
    cliente_id INT (20),
    fecha TEXT (80),
    FOREIGN KEY (empleado_id) REFERENCES empleados(empleado_id),
    FOREIGN KEY (cliente_id) REFERENCES clientes(cliente_id)
);