<?php
// Configuración de la base de datos
$host = "localhost";
$dbname = "ManejoCuarto"; // Reemplaza con el nombre de tu base de datos
$username = "postgres"; // Reemplaza con tu usuario de base de datos
$password = "root"; // Reemplaza con tu contraseña de base de datos

// Respuesta por defecto
$response = [
    'success' => false,
    'message' => ''
];

// Verificar si es una solicitud POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        // Conectar a la base de datos
        $conn = new PDO("pgsql:host=$host;dbname=$dbname", $username, $password);
        
        // Configurar PDO para que lance excepciones en caso de errores
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        // Obtener y limpiar datos del formulario
        $titulo = trim($_POST['titulo']);
        $descripcion = trim($_POST['descripcion']);
        $tipo = trim($_POST['tipo']);
        $fechaInicio = trim($_POST['fechaInicio']);
        $fechaFin = trim($_POST['fechaFin']);
        $costo = trim($_POST['costo']);
        $modalidad = trim($_POST['modalidad']);
        
        // Validar datos
        if (empty($titulo) || empty($tipo) || empty($fechaInicio) || empty($fechaFin) || empty($modalidad)) {
            throw new Exception("Todos los campos obligatorios deben ser completados");
        }
        
        // Convertir costo a formato decimal
        if (strtolower($costo) === 'gratis') {
            $costoNumerico = 0.00;
        } else {
            $costoNumerico = floatval(str_replace(',', '.', $costo));
            if ($costoNumerico < 0) {
                throw new Exception("El costo no puede ser negativo");
            }
        }
        
        // Preparar y ejecutar la consulta SQL
        $stmt = $conn->prepare("
            INSERT INTO EVENTOS_CURSOS (
                TIT_EVE_CUR, 
                DES_EVE_CUR, 
                FEC_INI_EVE_CUR, 
                FEC_FIN_EVE_CUR, 
                COS_EVE_CUR, 
                TIP_EVE, 
                MOD_EVE_CUR
            ) VALUES (
                :titulo, 
                :descripcion, 
                :fechaInicio, 
                :fechaFin, 
                :costo, 
                :tipo, 
                :modalidad
            )
        ");
        
        $stmt->bindParam(':titulo', $titulo);
        $stmt->bindParam(':descripcion', $descripcion);
        $stmt->bindParam(':fechaInicio', $fechaInicio);
        $stmt->bindParam(':fechaFin', $fechaFin);
        $stmt->bindParam(':costo', $costoNumerico);
        $stmt->bindParam(':tipo', $tipo);
        $stmt->bindParam(':modalidad', $modalidad);
        
        $stmt->execute();
        
        // Respuesta exitosa
        $response['success'] = true;
        $response['message'] = 'Evento guardado correctamente';
        
    } catch (PDOException $e) {
        // Error en la base de datos
        $response['message'] = 'Error de base de datos: ' . $e->getMessage();
    } catch (Exception $e) {
        // Error en la validación
        $response['message'] = $e->getMessage();
    } finally {
        // Cerrar la conexión
        $conn = null;
    }
} else {
    // Si no es una solicitud POST
    $response['message'] = 'Método no permitido';
}

// Devolver respuesta como JSON
header('Content-Type: application/json');
echo json_encode($response);
?>
