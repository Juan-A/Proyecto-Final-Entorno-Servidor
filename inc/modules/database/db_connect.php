<?php
//Función para conectar a la base de datos, devuelve un objeto PDO.
function db()
{
    $db_user = "root";
    $db_password = "nerja123";
    $db_host = "db";
    $db_name = "proyectodef";
    $pdo_string = "mysql:dbname=$db_name;host=$db_host";

    try {
        //Crea la conexión a la base de datos
        return new PDO($pdo_string, $db_user, $db_password);
    } catch (PDOException $e) {
        //Si caigo aquí es que ha habido un error en la conexión
        echo "<div class='error'>Error on the database connection. :( </div><br> ";
        echo "Details: " . $e->getMessage();
    }
}
