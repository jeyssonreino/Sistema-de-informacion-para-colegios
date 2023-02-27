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

    <title>Educación</title>


</head>


<body >
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
            <div class="col-md-9 inicio">
                <h1> Sistema de información para colegios</h1>
                <img src="resources/portada.jpg" alt="portada">



            </div>
        </div>
    </div>

</body>

</html>