<?php
    if (isset($_POST['guardar'])){
        require_once('config.php');

        $config = new Config();

        $config -> setNombre($_POST['nombre']);
        $config -> setCelular($_POST['celular']);
        $config -> setCompania($_POST['compania']);

        $config -> insertData();
        echo "<script>alert('datos guardados');document.location='./clientes.php'</script>";
    }
?>