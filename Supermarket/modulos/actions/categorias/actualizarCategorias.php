<?php 
    require_once("../../../configs/configCatego.php");
    $data = new Config();
    $id = $_GET['id'];
    $data-> setId($id);
    $record = $data->selectOne();
    print_r($record);
    $val = $record[0];
    print_r($val);

    if(isset($_POST['editar'])){
        $data->setNombreCategoria($_POST['categoriaNombre']);
        $data->setDescripcion($_POST['descripcion']);
        $data->setImagen($_POST['imagen']);

        $data->update();
        echo "<script>alert('Datos actualizados satisfactoriamente');document.location='../../file/categorias.php'</script>";
    }
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Página </title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;400;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">


  <link rel="stylesheet" type="text/css" href="../../../css/styles.css">

</head>

<body>
  <div class="contenedor">

    <div class="parte-izquierda">

      <div class="perfil">
        <h3 style="margin-bottom: 2rem;">Camper Skills.</h3>
        <img src="https://img.freepik.com/vector-gratis/astronauta-dabbing-cartoon-vector-icon-illustration-concepto-icono-tecnologia-ciencia-aislado-vector-premium-estilo-dibujos-animados-plana_138676-3360.jpg?w=2000" alt="" class="imagenPerfil">
        <h3>Sergio Prada</h3>
      </div>
      <div class="menus">
        <a href="../../file/categorias.php" style="display: flex;gap:2px;">
          <i class="bi bi-house-door"> </i>
          <h3 style="margin: 0px;">Categorias</h3>
        </a>
        <a href="../../file/clientes.php" style="display: flex;gap:1px;">
          <i class="bi bi-people"></i>
          <h3 style="margin: 0px;font-weight: 800;">Clientes</h3>
        </a>
        <a href="../../file/empleados.php" style="display: flex;gap:1px;">
          <i class="bi bi-people"></i>
          <h3 style="margin: 0px;font-weight: 800;">Empleados</h3>
        </a>
        <a href="../../file/facturas.php" style="display: flex;gap:1px;">
          <i class="bi bi-people"></i>
          <h3 style="margin: 0px;font-weight: 800;">Facturas</h3>
        </a>
        <a href="../../file/clientes.php" style="display: flex;gap:1px;">
          <i class="bi bi-people"></i>
          <h3 style="margin: 0px;font-weight: 800;">Clientes</h3>
        </a>
        <a href="../../file/facturaD.php" style="display: flex;gap:1px;">
          <i class="bi bi-people"></i>
          <h3 style="margin: 0px;font-weight: 800;">Factura Detalle</h3>
        </a>
        <a href="../../file/productos.php" style="display: flex;gap:1px;">
          <i class="bi bi-people"></i>
          <h3 style="margin: 0px;font-weight: 800;">Productos</h3>
        </a>
        <a href="../../file/proveedores.php" style="display: flex;gap:1px;">
          <i class="bi bi-people"></i>
          <h3 style="margin: 0px;font-weight: 800;">Proveedores</h3>
        </a>
      </div>
    </div>
    <div class="parte-media">
        <h2 class="m-2">categoria a Editar</h2>
        <div class="menuTabla contenedor2">
            <form class="col d-flex flex-wrap" action=""  method="post">
                <div class="mb-1 col-12">
                    <label for="nombres" class="form-label">Nombres</label>
                    <input 
                      type="text"
                      id="nombres"
                      name="categoriaNombre"
                      class="form-control"  
                      value="<?php echo $val['categoriaNombre'];?>"
                    />
                </div>

                <div class="mb-1 col-12">
                  <label for="descripcion" class="form-label">Descripcion</label>
                  <input 
                    type="text"
                    id="descripcion"
                    name="descripcion"
                    class="form-control"  
                    value="<?php echo $val['descripcion'];?>"
                  />
                </div>

                <div class="mb-1 col-12">
                  <label for="imagen" class="form-label">Imagen</label>
                  <input 
                    type="text"
                    id="imagen"
                    name="imagen"
                    class="form-control"  
                    value="<?php echo $val['imagen'];?>"
                  />
                </div>

                <div class=" col-12 m-2">
                    <input type="submit" class="btn btn-primary" value="UPDATE" name="editar"/>
                </div>
            </form>  
            <div id="charts1" class="charts"> </div>
        </div>
    </div>

    <div class="parte-derecho " id="detalles">
      <h3>Detalle Estudiantes</h3>
      <p>Cargando...</p>
       <!-- ///////Generando la grafica -->

    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
    crossorigin="anonymous"></script>
</body>
</html>