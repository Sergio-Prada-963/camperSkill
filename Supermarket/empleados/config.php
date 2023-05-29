<?php
    require_once("./db.php");

    class Config{
        private $empleado_id;
        private $nombre;
        private $celular;
        private $direccion;
        private $imagen;
        protected $dbCnx;

        public function __construct($empleado_id = 0, $nombre = '', $celular = '', $direccion = '', $imagen = ''){
            $this->empleado_id = $empleado_id;
            $this->nombre = $nombre;
            $this->celular = $celular;
            $this->direccion = $direccion;
            $this->imagen = $imagen;

            $this->dbCnx = new PDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PWD, [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
        }

        public function setId($empleado_id) {
            $this->empleado_id = $empleado_id;
        }
    
        public function getId() {
            return $this->empleado_id;
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

        public function setDireccion($direccion) {
            $this->direccion = $direccion;
        }
    
        public function getDireccion() {
            return $this->direccion;
        }
    
        public function setImagen($imagen) {
            $this->imagen = $imagen;
        }
    
        public function getImagen() {
            return $this->imagen;
        }

        public function insertData() {
            try {
                $stmt = $this->dbCnx->prepare("INSERT INTO empleados (nombre, celular, direccion, imagen) VALUES (?, ?, ?, ?)");
                $stmt->execute([$this->nombre, $this->celular, $this->direccion, $this->imagen]);
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }

        public function obtainAll(){
            try {
                $stm = $this -> dbCnx -> prepare("SELECT * FROM empleados");
                $stm -> execute();
                return $stm -> fetchAll();
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }

        public function delete(){
            try {
                $stm = $this -> dbCnx -> prepare("DELETE FROM empleados WHERE empleado_id = ?");
                $stm -> execute([$this->empleado_id]);
                return $stm -> fetchAll();
                echo "<script>alert('Registro eliminado');document.location='./empleados.php'</script>";
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }

        public function selectOne(){
            try {
                $stm = $this->dbCnx->prepare("SELECT * FROM empleados WHERE empleado_id=?");
                $stm-> execute([$this-> empleado_id]);
                return $stm-> fetchAll();
            } catch (Exception $e) {
                return $e-> getMessage();
            }
        }
        public function update(){
            try {
                $stm = $this->dbCnx->prepare("UPDATE empleados SET nombre=?, celular=?, direccion=?, imagen=? WHERE empleado_id=?");
                $stm-> execute([$this->nombre, $this->celular, $this->direccion, $this->imagen, $this->empleado_id]);
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }
    }
?>