<?php 
    session_start();
    require_once("config.php");

    if (isset($_POST['submit'])) {
        $nombre = mysqli_real_escape_string($conn, $_POST['nombre']);
        $apellido = mysqli_real_escape_string($conn, $_POST['apellido']);
        $DNI = mysqli_real_escape_string($conn, $_POST['dni']);
        $fecha = mysqli_real_escape_string($conn, $_POST['fecha']);
        $calle = mysqli_real_escape_string($conn, $_POST['calle']);
        $numero = mysqli_real_escape_string($conn, $_POST['nro']);
        $localidad = mysqli_real_escape_string($conn, $_POST['localidad']);

        //validate the DNI
        require("validation.php");

        //Enviar datos a la base de datos
        if (count($errors) == 0) {
            $query = "INSERT INTO user(nombre, apellido, dni, fecha, calle, numero, localidad) 
            VALUES('$nombre', '$apellido', '$DNI', '$fecha', '$calle', '$numero', '$localidad')";

            mysqli_query($conn, $query);

            echo '
                <script>
                    alert("A new user has been created");
                    window.location = "../index.html";
                </script>
            ';
        }
        exit;
    }

    $conn->close();
?>