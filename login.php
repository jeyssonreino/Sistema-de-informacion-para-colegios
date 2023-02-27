<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="estilos/login.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <title>Educación</title>
</head>

<body>
    <div class="container-fluid formulario">
        <div class="row">
            <div class="col-md-4">
            </div>
            <div class="col-md-4">
                <h1>Sistema de información para colegios</h1>
                <form method="POST" action="#">
                    <div class="form-group">
                        <label for="Usuario">
                            Usuario
                        </label>
                        <input type="text" name="usuario" class="form-control" id="Usuario" required />
                    </div>
                    <div class="form-group">
                        <label for="Contrasena">
                            Contraseña
                        </label>
                        <input type="password" name="contrasena" class="form-control" id="Contrasena" required />
                    </div>

                    <button type="submit" class="btn btn-primary">
                        Ingresar
                    </button>
                </form>
            </div>
            <div class="col-md-4">
            </div>
        </div>
    </div>
</body>

<?php

if (isset($_POST['usuario'])  && isset($_POST['contrasena'])) {
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];
    session_start();
    $_SESSION['usuario'] = $usuario;
    $_SESSION['contrasena'] = $contrasena;

    include('conexion.php');
    
    $sql = "SELECT * FROM `usuarios` WHERE `user` = '$usuario'";
    $query = $con->query($sql);
    $cantidaduser = $query->num_rows;

    $sql2 = "SELECT * FROM `usuarios` WHERE `pass` = '$contrasena';";
    $querypass = $con->query($sql2);
    $cantidadpass = $querypass->num_rows;
    $con->close();

    if ($cantidaduser) {
        if ($cantidadpass) {
            header('Location:index.php');
        } else {
            echo "<script>swal('¡Contraseña incorrecta!')</script>";
        }
    } else {

        echo "<script>swal('¡El usuario no existe!')</script>";
    }
}
?>

</html>