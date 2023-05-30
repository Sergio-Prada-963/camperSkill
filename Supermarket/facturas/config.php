<?php
    require_once("./db.php");

    class Config{
        private $factura_id;
        private $empleado_id;
        private $cliente_id;
        private $fecha;
        protected $dbCnx;

        public function __construct($factura_id = 0, $empleado_id = 0, $cliente_id = 0,  $fecha = '' ){
            $this->factura_id = $factura_id;
            $this->empleado_id = $empleado_id;
            $this->cliente_id = $cliente_id;
            $this->fecha = $fecha;

            $this->dbCnx = new PDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PWD, [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
        }

        public function setId($factura_id) {
            $this->factura_id = $factura_id;
        }
    
        public function getId() {
            return $this->factura_id;
        }
    
        public function setEmpleado_id($empleado_id) {
            $this->empleado_id = $empleado_id;
        }
    
        public function getEmpleado_id() {
            return $this->empleado_id;
        }
    
        public function setCliente_id($cliente_id) {
            $this->cliente_id = $cliente_id;
        }
    
        public function getCliente_id() {
            return $this->cliente_id;
        }
    
        public function setFecha($fecha) {
            $this->fecha = $fecha;
        }
    
        public function getFecha() {
            return $this->fecha;
        }

        public function obtenerEmpleadoId(){
            try {
                $stm = $this-> dbCnx -> prepare("SELECT empleado_id,nombre FROM empleados");
                $stm -> execute();
                return $stm -> fetchAll();
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }
    
        public function EmpleadoId(){
            try {
                $stm = $this-> dbCnx -> prepare("SELECT empleado_id, nombre FROM empleados WHERE empleado_id=:empleado_id");
                $stm->bindParam(":empleado_id",$this->empleado_id);
                $stm -> execute();
                return $stm -> fetchAll();
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }
    
        public function ClienteId(){
            try {
                $stm = $this-> dbCnx -> prepare("SELECT cliente_id, nombre FROM clientes WHERE cliente_id=:cliente_id");
                $stm->bindParam(":cliente_id",$this->cliente_id);
                $stm -> execute();
                return $stm -> fetchAll();
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }
    
        public function obtenerClienteId(){
            try {
                $stm = $this-> dbCnx -> prepare("SELECT cliente_id, nombre  FROM clientes");
                $stm -> execute();
                return $stm -> fetchAll();
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }

        public function insertData() {
            try {
                $stmt = $this->dbCnx->prepare("INSERT INTO facturas (empleado_id, cliente_id, fecha) VALUES (?, ?, ?)");
                $stmt->execute([$this->empleado_id, $this->cliente_id, $this->fecha]);
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }

        public function obtainAll(){
            try {
                $stm = $this -> dbCnx -> prepare("SELECT * FROM facturas");
                $stm -> execute();
                return $stm -> fetchAll();
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }

        public function delete(){
            try {
                $stm = $this -> dbCnx -> prepare("DELETE FROM facturas WHERE factura_id = ?");
                $stm -> execute([$this->factura_id]);
                return $stm -> fetchAll();
                echo "<script>alert('Registro eliminado');document.location='facturas.php'</script>";
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }

        public function selectOne(){
            try {
                $stm = $this->dbCnx->prepare("SELECT * FROM facturas WHERE factura_id=?");
                $stm-> execute([$this-> factura_id]);
                return $stm-> fetchAll();
            } catch (Exception $e) {
                return $e-> getMessage();
            }
        }
        public function update(){
            try {
                $stm = $this->dbCnx->prepare("UPDATE facturas SET empleado_id=?, cliente_id=?, fecha=? WHERE factura_id=?");
                $stm-> execute([$this->empleado_id, $this->cliente_id, $this->fecha, $this->factura_id]);
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }
    }
?>