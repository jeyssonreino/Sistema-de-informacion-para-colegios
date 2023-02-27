<?php
session_start();

if (!$_SESSION['usuario']) {
    header('Location:login.php');
    die();
}



?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="estilos/index.css">
    <link rel="stylesheet" href="estilos/colegios.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <title>Educación</title>


</head>


<body>
    <div class="container-fluid  ">
        <div class="row ">
            <div class="col-md-3 menu">
                <div class="col-md-12 ">
                    <h1>Menu</h1>
                    <hr>
                </div>
                <div class="col-md-12 opciones">
                    <ul class="nav flex-column ">
                        <li class="nav-item opcion">
                            <a class="nav-link aopcion" href="index.php">Inicio</a>
                        </li>
                        <li class="nav-item opcion">
                            <a class="nav-link aopcion" href="colegios.php">Colegios</a>
                        </li>
                        <li class="nav-item opcion">
                            <a class="nav-link aopcion" href="estudiantes.php">Estudiantes</a>
                        </li>
                        <li class="nav-item opcion">
                            <a class="nav-link aopcion" href="listado.php">Listados</a>
                        </li>
                        <li class="nav-item opcion">
                            <a class="nav-link aopcion" href="logout.php">Salir</a>
                        </li>

                    </ul>
                </div>



            </div>
            <div class="col-md-9 contenedor">
                <div class="titulo">
                    <h1>Colegios</h1>
                </div>
                <form method="POST" action="#">
                    <div class="form-group row item">
                        <label class="col-4 col-form-label" for="id">Id</label>
                        <div class="col-8">
                            <input id="id" name="id" type="text" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group row item">
                        <label for="nombre" class="col-4 col-form-label">Nombre</label>
                        <div class="col-8">
                            <input id="nombre" name="nombre" type="text" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group row item">
                        <label for="direccion" class="col-4 col-form-label">Dirección</label>
                        <div class="col-8">
                            <input id="direccion" name="direccion" type="text" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group row item">
                        <label for="telefono" class="col-4 col-form-label">Telefono</label>
                        <div class="col-8">
                            <input id="telefono" name="telefono" type="text" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group row item">
                        <label for="fecha" class="col-4 col-form-label">Fecha de creación</label>
                        <div class="col-8">
                            <input id="fecha" name="fecha" type="date" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group row item">
                        <label for="tipo" class="col-4 col-form-label">Tipo</label>
                        <div class="col-8">
                            <select class="form-select" name="tipo">
                                <option value="pr">Público</option>
                                <option value="pu">Privado</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row item">
                        <div class="offset-4 col-8">
                            <button name="submit" type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>


<?php

if (isset($_POST['id']) && isset($_POST['nombre']) && isset($_POST['direccion'])  && isset($_POST['telefono']) && isset($_POST['fecha']) && isset($_POST['tipo'])) {

    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $direccion = $_POST['direccion'];
    $telefono = $_POST['telefono'];
    $fecha = $_POST['fecha'];
    $tipo = $_POST['tipo'];

    include('conexion.php');
    $validar = "SELECT * FROM `colegios` WHERE `idcol` = '$id'";
    $existe = $con->query($validar);
    $cantidad = $existe->num_rows;
    if ($cantidad == 0) {
        $sql = "INSERT INTO `colegios`(`idcol`, `cnom`, `cdir`, `ctel`, `fecha_creacion`, `tipo`) VALUES ('$id','$nombre','$direccion','$telefono','$fecha','$tipo')";
        $query = $con->query($sql);
        if ($query) {
            echo "<script>swal('¡Colegio guardado exitosamente!')</script>";
        } else {
            echo "<script>swal('¡Error al guardar el colegio!')</script>";
        }
    } else {
        echo "<script>swal('¡El colegio ya se encuentra registrado!')</script>";
    }
    $con->close();
}




?>

</html>