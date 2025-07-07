<?php include "conexion.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $campos = ["nombre", "descripcion", "categoria", "precio", "stock", "proveedor", "fecha_ingreso", "codigo_barra"];
    foreach ($campos as $campo) {
        if (empty($_POST[$campo])) {
            die("Faltan campos obligatorios.");
        }
    }

    $sql = "INSERT INTO productos (nombre, descripcion, categoria, precio, stock, proveedor, fecha_ingreso, codigo_barra)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("sssdisss", 
        $_POST["nombre"], $_POST["descripcion"], $_POST["categoria"],
        $_POST["precio"], $_POST["stock"], $_POST["proveedor"],
        $_POST["fecha_ingreso"], $_POST["codigo_barra"]
    );
    $stmt->execute();
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Producto</title>
    <link rel="stylesheet" href="candy.css">
</head>
<body>
    <h2>Agregar nuevo producto</h2>
    <form method="POST">
        <input type="text" name="nombre" placeholder="Nombre">
        <textarea name="descripcion" placeholder="Descripción"></textarea>
        <input type="text" name="categoria" placeholder="Categoría">
        <input type="number" step="0.01" name="precio" placeholder="Precio">
        <input type="number" name="stock" placeholder="Stock">
        <input type="text" name="proveedor" placeholder="Proveedor">
        <input type="date" name="fecha_ingreso">
        <input type="text" name="codigo_barra" placeholder="Código de barra">
        <button type="submit">Guardar</button>
    </form>
</body>
</html>
