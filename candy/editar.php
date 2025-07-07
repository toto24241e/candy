<?php include "conexion.php";

if (!isset($_GET["id"])) die("ID no válido");
$id = $_GET["id"];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sql = "UPDATE productos SET nombre=?, descripcion=?, categoria=?, precio=?, stock=?, proveedor=?, fecha_ingreso=?, codigo_barra=? WHERE id=?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("sssdisssi", 
        $_POST["nombre"], $_POST["descripcion"], $_POST["categoria"],
        $_POST["precio"], $_POST["stock"], $_POST["proveedor"],
        $_POST["fecha_ingreso"], $_POST["codigo_barra"], $id
    );
    $stmt->execute();
    header("Location: index.php");
    exit;
}

$resultado = $conexion->query("SELECT * FROM productos WHERE id=$id");
$producto = $resultado->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Producto</title>
    <link rel="stylesheet" href="candy.css">
</head>
<body>
    <h2>Editar producto</h2>
    <form method="POST">
        <input type="text" name="nombre" value="<?= $producto["nombre"] ?>">
        <textarea name="descripcion"><?= $producto["descripcion"] ?></textarea>
        <input type="text" name="categoria" value="<?= $producto["categoria"] ?>">
        <input type="number" step="0.01" name="precio" value="<?= $producto["precio"] ?>">
        <input type="number" name="stock" value="<?= $producto["stock"] ?>">
        <input type="text" name="proveedor" value="<?= $producto["proveedor"] ?>">
        <input type="date" name="fecha_ingreso" value="<?= $producto["fecha_ingreso"] ?>">
        <input type="text" name="codigo_barra" value="<?= $producto["codigo_barra"] ?>">
        <button type="submit">Actualizar</button>
    </form>
</body>
</html>
