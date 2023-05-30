CREATE DATABASE facturacion

CREATE TABLE facturas(
    factura_id INT primary key AUTO_INCREMENT,
    empleado_id INT (10),
    cliente_id INT (10),
    fecha VARCHAR (50)
);


ALTER TABLE `facturas` ADD CONSTRAINT `facturas_ibfk_2` FOREIGN KEY (`cliente_id`) REFERENCES `clientes`(`cliente_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
ALTER TABLE `facturas` ADD FOREIGN KEY (`empleado_id`) REFERENCES `empleados`(`empleado_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;