<?php

ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);

    require_once("db.php");

    class Config{
        private $id;
        private $nombreCategoria;
        private $descripcion;
        private $imagen;
        protected $dbCnx;

        public function __construct($id = 0, $nombreCategoria = '', $descripcion = '', $imagen = ''){
            $this->id = $id;
            $this->nombreCategoria = $nombreCategoria;
            $this->descripcion = $descripcion;
            $this->imagen = $imagen;

            $this->dbCnx = new PDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PWD, [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
        }

        public function setId($id) {
            $this->id = $id;
        }
    
        public function getId() {
            return $this->id;
        }
    
        public function setNombreCategoria($nombreCategoria) {
            $this->nombreCategoria = $nombreCategoria;
        }
    
        public function getNombreCategoria() {
            return $this->nombreCategoria;
        }
    
        public function setDescripcion($descripcion) {
            $this->descripcion = $descripcion;
        }
    
        public function getDescripcion() {
            return $this->descripcion;
        }
    
        public function setImagen($imagen) {
            $this->imagen = $imagen;
        }
    
        public function getImagen() {
            return $this->imagen;
        }

        public function insertData() {
            try {
                $stmt = $this->dbCnx->prepare("INSERT INTO categorias (categoriaNombre, descripcion, imagen) VALUES (?, ?, ?)");
                $stmt->execute([$this->nombreCategoria, $this->descripcion, $this->imagen]);
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }

        public function obtainAll(){
            try {
                $stm = $this -> dbCnx -> prepare("SELECT * FROM categorias");
                $stm -> execute();
                return $stm -> fetchAll();
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }

        public function delete(){
            try {
                $stm = $this -> dbCnx -> prepare("DELETE FROM categorias WHERE id = ?");
                $stm -> execute([$this->id]);
                return $stm -> fetchAll();
                echo "<script>alert('Registro eliminado');document.location='estudiantes.php'</script>";
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }
    }
?>