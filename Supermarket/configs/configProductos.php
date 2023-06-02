<?php
    require_once("pdo.php");

    class Config extends ConexionPdo{
        private $producto_id;
        private $categoria_id;
        private $precioUnitario;
        private $stock;
        private $unidades_pedidas;
        private $proveedor_id;
        private $nombre_producto;
        private $descontinuado;

        public function __construct($producto_id=0, $categoria_id=0, $precioUnitario=0, $stock=0, $unidades_pedidas=0, $proveedor_id=0, $nombre_producto='', $descontinuado=''){
            $this->producto_id = $producto_id;
            $this->categoria_id = $categoria_id;
            $this->precioUnitario = $precioUnitario;
            $this->stock = $stock;
            $this->unidades_pedidas = $unidades_pedidas;
            $this->proveedor_id = $proveedor_id;
            $this->nombre_producto = $nombre_producto;
            $this->descontinuado = $descontinuado;
            parent::__construct();
        }

        public function setId($producto_id) {
            $this->producto_id = $producto_id;
        }
    
        public function getId() {
            return $this->producto_id;
        }
    
        public function setCategoria_id($categoria_id) {
            $this->categoria_id = $categoria_id;
        }
    
        public function getCategoria_id() {
            return $this->categoria_id;
        }
    
        public function setPrecioUnitario($precioUnitario) {
            $this->precioUnitario = $precioUnitario;
        }
    
        public function getPrecioUnitario() {
            return $this->precioUnitario;
        }
    
        public function setStock($stock) {
            $this->stock = $stock;
        }
    
        public function getStock() {
            return $this->stock;
        }

        public function setUnidades_pedidas($unidades_pedidas) {
            $this->unidades_pedidas = $unidades_pedidas;
        }
    
        public function getUnidades_pedidas() {
            return $this->unidades_pedidas;
        }

        public function setProveedor_id($proveedor_id) {
            $this->proveedor_id = $proveedor_id;
        }
    
        public function getProveedor_id() {
            return $this->proveedor_id;
        }

        public function setNombre_producto($nombre_producto) {
            $this->nombre_producto = $nombre_producto;
        }
    
        public function getNombre_producto() {
            return $this->nombre_producto;
        }

        public function setDescontinuado($descontinuado) {
            $this->descontinuado = $descontinuado;
        }
    
        public function getDescontinuado() {
            return $this->descontinuado;
        }

        public function insertData() {
            try {
                $stm = $this->dbCnx->prepare("INSERT INTO productos (categoria_id, precioUnitario, stock, unidades_pedidas, proveedor_id, nombre_producto, descontinuado) VALUES (?,?,?,?,?,?,?)");
                $stm->execute([$this->categoria_id, $this->precioUnitario, $this->stock, $this->unidades_pedidas, $this->proveedor_id, $this->nombre_producto, $this->descontinuado]);
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }

        public function obtainAll(){
            try {
                $stm = $this -> dbCnx -> prepare("SELECT * FROM productos");
                $stm -> execute();
                return $stm -> fetchAll();
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }

        public function delete(){
            try {
                $stm = $this -> dbCnx -> prepare("DELETE FROM productos WHERE producto_id = ?");
                $stm -> execute([$this->producto_id]);
                return $stm -> fetchAll();
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }

        public function selectOne(){
            try {
                $stm = $this->dbCnx->prepare("SELECT * FROM productos WHERE producto_id=?");
                $stm-> execute([$this-> producto_id]);
                return $stm-> fetchAll();
            } catch (Exception $e) {
                return $e-> getMessage();
            }
        }
        public function update(){
            try {
                $stm = $this->dbCnx->prepare("UPDATE productos SET categoria_id=?, precioUnitario=?, stock=?, unidades_pedidas=?, proveedor_id=?, nombre_producto=?, descontinuado=? WHERE producto_id=?");
                $stm-> execute([$this->categoria_id, $this->precioUnitario, $this->stock, $this->unidades_pedidas, $this->proveedor_id, $this->nombre_producto, $this->descontinuado]);
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }
    }
?>