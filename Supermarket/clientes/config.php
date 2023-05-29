<?php
    require_once("db.php");

    class Config{
        private $cliente_id;
        private $nombre;
        private $celular;
        private $compania;
        protected $dbCnx;

        public function __construct($cliente_id = 0, $nombre = '', $celular = '', $compania = ''){
            $this->cliente_id = $cliente_id;
            $this->nombre = $nombre;
            $this->celular = $celular;
            $this->compania = $compania;

            $this->dbCnx = new PDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PWD, [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
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
                $stmt = $this->dbCnx->prepare("INSERT INTO clientes (nombre, celular, compania) VALUES (?, ?, ?)");
                $stmt->execute([$this->nombre, $this->celular, $this->compania]);
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
                $stm = $this -> dbCnx -> prepare("DELETE FROM clientes WHERE cliente_id = ?");
                $stm -> execute([$this->cliente_id]);
                return $stm -> fetchAll();
                echo "<script>alert('Registro eliminado');document.location='./clientes.php'</script>";
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }

        public function selectOne(){
            try {
                $stm = $this->dbCnx->prepare("SELECT * FROM clientes WHERE cliente_id=?");
                $stm-> execute([$this-> cliente_id]);
                return $stm-> fetchAll();
            } catch (Exception $e) {
                return $e-> getMessage();
            }
        }
        public function update(){
            try {
                $stm = $this->dbCnx->prepare("UPDATE clientes SET nombre=?, celular=?, compania=? WHERE cliente_id=?");
                $stm-> execute([$this->nombre, $this->celular, $this->compania, $this->cliente_id]);
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }
    }
?>