<?php
    require_once("pdo.php");

    class Config extends ConexionPdo{
        private $cliente_id;
        private $nombre;
        private $celular;
        private $compania;

        public function __construct($cliente_id = 0, $nombre = '', $celular = 0, $compania = ''){
            $this->cliente_id = $cliente_id;
            $this->nombre = $nombre;
            $this->celular = $celular;
            $this->compania = $compania;
            parent::__construct();
        }

        public function setId($cliente_id) {
            $this->cliente_id = $cliente_id;
        }
    
        public function getId() {
            return $this->cliente_id;
        }
    
        public function setNombre($nombre) {
            $this->nombre = $nombre;
        }
    
        public function getNombre() {
            return $this->nombre;
        }
    
        public function setCelular($celular) {
            $this->celular = $celular;
        }
    
        public function getCelular() {
            return $this->celular;
        }
    
        public function setCompania($compania) {
            $this->compania = $compania;
        }
    
        public function getCompania() {
            return $this->compania;
        }

        public function insertData() {
            try {
                $stm = $this->dbCnx->prepare("INSERT INTO clientes (nombre, celular, compania) VALUES (:nombre, :celular, :compania)");
                $stm->bindParam(":nombre",$this->nombre);
                $stm->bindParam(":celular",$this->celular);
                $stm->bindParam(":compania",$this->compania);
                $stm->execute();
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }

        public function obtainAll(){
            try {
                $stm = $this -> dbCnx -> prepare("SELECT * FROM clientes");
                $stm -> execute();
                return $stm -> fetchAll();
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }

        public function delete(){
            try {
                $stm = $this -> dbCnx -> prepare("DELETE FROM clientes WHERE cliente_id = :id");
                $stm->bindParam(":id",$this->cliente_id);
                $stm -> execute();
                echo "<script>alert('Registro eliminado');document.location='../modulos/file/clientes.php'</script>";
                return $stm -> fetchAll();
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }

        public function selectOne(){
            try {
                $stm = $this->dbCnx->prepare("SELECT * FROM clientes WHERE cliente_id=:id");
                $stm->bindParam(":id",$this->cliente_id);
                $stm -> execute();
                return $stm-> fetchAll();
            } catch (Exception $e) {
                return $e-> getMessage();
            }
        }
        public function update(){
            try {
                $stm = $this->dbCnx->prepare("UPDATE clientes SET nombre=:nombre, celular=:celular, compania=:compania WHERE cliente_id=:id");
                $stm->bindParam(":id",$this->cliente_id);
                $stm->bindParam(":nombre",$this->nombre);
                $stm->bindParam(":celular",$this->celular);
                $stm->bindParam(":compania",$this->compania);
                $stm-> execute();
                return $stm->fetchAll();
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }
    }
?>