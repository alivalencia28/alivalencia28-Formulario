<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado de Solicitud de Trabajo</title>
    <link rel="stylesheet" href="style.css"> <!-- Asegúrate de que el archivo CSS esté en la misma carpeta -->
</head>
<body>
    <div class="container">
        <?php
        // Conexión a la base de datos MySQL
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "solicitudes_trabajo";

        // Crear conexión
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Verificar conexión
        if ($conn->connect_error) {
            die("Error de conexión: " . $conn->connect_error);
        }

        // Obtener los datos del formulario
        $nombre = $_POST['nombre'];
        $email = $_POST['email'];
        $telefono = $_POST['telefono'];
        $puesto = $_POST['puesto'];
        $nivel_educacion = $_POST['nivel_educacion'];
        $experiencia = $_POST['experiencia'];
        $viajar = $_POST['viajar'];
        $salario = $_POST['salario'];
        $habilidad_equipo = $_POST['habilidad_equipo'];
        $rating_programacion = $_POST['rating_programacion'];
        $nps = $_POST['nps'];
        $comentario = $_POST['comentario'];

        // Insertar los datos en la base de datos
        $sql = "INSERT INTO solicitudes (nombre, email, telefono, puesto, nivel_educacion, experiencia, viajar, salario, habilidad_equipo, rating_programacion, nps, comentario)
                VALUES ('$nombre', '$email', '$telefono', '$puesto', '$nivel_educacion', '$experiencia', '$viajar', '$salario', '$habilidad_equipo', '$rating_programacion', '$nps', '$comentario')";

        if ($conn->query($sql) === TRUE) {
            echo "<h1>Datos almacenados exitosamente</h1>";
            echo "<p><strong>Nombre:</strong> $nombre</p>";
            echo "<p><strong>Email:</strong> $email</p>";
            echo "<p><strong>Teléfono:</strong> $telefono</p>";
            echo "<p><strong>Puesto solicitado:</strong> $puesto</p>";
            echo "<p><strong>Nivel de educación:</strong> $nivel_educacion</p>";
            echo "<p><strong>Experiencia laboral:</strong> $experiencia</p>";
            echo "<p><strong>¿Estás dispuesto a viajar?:</strong> $viajar</p>";
            echo "<p><strong>Salario esperado:</strong> $salario MXN</p>";
            echo "<p><strong>Habilidad para trabajo en equipo:</strong> $habilidad_equipo</p>";
            echo "<p><strong>Calificación de programación:</strong> $rating_programacion estrellas</p>";
            echo "<p><strong>Net Promoter Score (NPS):</strong> $nps</p>";
            echo "<p><strong>Comentario:</strong> $comentario</p>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        // Cerrar la conexión
        $conn->close();
        ?>
    </div>
</body>
</html>
