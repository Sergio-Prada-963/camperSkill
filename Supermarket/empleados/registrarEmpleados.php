<?php
    if (isset($_POST['guardar'])){
        require_once('./config.php');

        $config = new Config();

        $config -> setNombre($_POST['nombre']);
        $config -> setCelular($_POST['celular']);
        $config -> setDireccion($_POST['direccion']);
        $config -> setImagen($_POST['imagen']);

        $config -> insertData();
        echo "<script>alert('datos guardados');document.location='./empleados.php'</script>";
    }

?>