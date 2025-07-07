<?php
include "conexion.php";
if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $conexion->query("DELETE FROM productos WHERE id=$id");
}
header("Location: index.php");
?>

