<?php include "conexion.php"; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Kiosko Candy</title>
    <link rel="stylesheet" href="candy.css">
</head>
<body>
    <h1>Kiosko Candy </h1>
    <a href="agregar.php" class="boton">Agregar nuevo producto</a>
    <table>
        <tr>
            <th>Nombre</th><th>Descripción</th><th>Categoría</th><th>Precio</th><th>Stock</th>
            <th>Proveedor</th><th>Fecha</th><th>Código</th><th>Acciones</th>
        </tr>
        <?php
        $resultado = $conexion->query("SELECT * FROM productos");
        while($fila = $resultado->fetch_assoc()):
        ?>
        <tr>
            <td><?= $fila["nombre"] ?></td>
            <td><?= $fila["descripcion"] ?></td>
            <td><?= $fila["categoria"] ?></td>
            <td>$<?= $fila["precio"] ?></td>
            <td><?= $fila["stock"] ?></td>
            <td><?= $fila["proveedor"] ?></td>
            <td><?= $fila["fecha_ingreso"] ?></td>
            <td><?= $fila["codigo_barra"] ?></td>
           <td>
    <a href="editar.php?id=<?= $fila["id"] ?>" class="btn-editar">Editar</a>
    <a href="eliminar.php?id=<?= $fila["id"] ?>" class="btn-eliminar" onclick="return confirm('¿Eliminar producto?')">Eliminar</a>
</td>

        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>

