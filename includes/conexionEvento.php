<?php
class CConexion{
static function ConexionBD(){
$host = "localhost";
$dbname = "ManejoP2"; 
$username = "postgres"; 
$password = "root"; 

try {
$conn = new PDO("pgsql:host=$host;dbname=$dbname", $username, $password);
 echo " se conecto correctamente a la base";
} catch (PDOException $exp) {
    echo ("no se puede conectar a la base, $exp" );
}
return $conn;
}
}
?>