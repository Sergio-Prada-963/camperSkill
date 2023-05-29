<?php
    if (isset($_POST['guardar'])){
        require_once('./config.php');

        $config = new Config();

        $config -> setEmpleado_id($_POST['empleado_id']);
        $config -> setCliente_id($_POST['cliente_id']);
        $config -> setFecha($_POST['fecha']);

        $config -> insertData();
        echo "<script>alert('datos guardados');document.location='./facturas.php'</script>";
    }

?>