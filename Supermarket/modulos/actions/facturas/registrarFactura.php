<?php
    if (isset($_POST['guardar'])){
        require_once('../../../configs/configFacturas.php');

        $config = new Config();

        $config -> setEmpleado_id($_POST['empleado_id']);
        $config -> setCliente_id($_POST['cliente_id']);
        $config -> setFecha($_POST['fecha']);

        $config -> insertData();

        echo "<script>alert('datos guardados');document.location='../../file/facturas.php'</script>";
    }

?>