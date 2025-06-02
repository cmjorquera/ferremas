<?php
header('Content-Type: application/json');
error_reporting(E_ALL);
ini_set('display_errors', 1);

try {
    require_once('../../conf/database.php');

    if (!isset($conn)) {
        throw new Exception("Variable \$conn no definida.");
    }

    if ($conn->connect_error) {
        throw new Exception("Error de conexión: " . $conn->connect_error);
    }

    $sql = "
    SELECT 
      p.id,
      p.codigo_producto,
      p.codigo_marca,
      p.marca,
      p.nombre,
      s.nombre_subcategoria AS subcategoria,
      c.nombre_categoria AS categoria,
      p.stock,
      p.precio,
      p.fecha_precio,
      p.imagen
    FROM productos p
    JOIN subcategorias s ON p.id_subcategoria = s.id_subcategoria
    JOIN categorias c ON s.id_categoria = c.id_categoria
    ORDER BY p.id DESC
    ";

    $result = $conn->query($sql);

    if (!$result) {
        throw new Exception("Error en la consulta: " . $conn->error);
    }

    $productos = [];
    while ($row = $result->fetch_assoc()) {
        $productos[] = $row;
    }

    echo json_encode($productos, JSON_UNESCAPED_UNICODE);

} catch (Exception $e) {
    http_response_code(500);
    echo json_encode([
        'estado' => 'error',
        'mensaje' => $e->getMessage()
    ]);
}
?>
