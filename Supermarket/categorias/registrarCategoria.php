<?php
    if (isset($_POST['guardar'])){
        require_once('config.php');

        $config = new Config();

        $config -> setNombreCategoria($_POST['nombreCategorias']);
        $config -> setDescripcion($_POST['descripcion']);
        $config -> setImagen($_POST['imagen']);

        $config -> insertData();
        echo "<script>alert('datos guardados');document.location='./../index.php'</script>";
    }

?>