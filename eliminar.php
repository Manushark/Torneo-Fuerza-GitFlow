<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $archivo = "datos/$id.dat";

    if (file_exists($archivo)) {
        unlink($archivo);
        header("Location: index.php?mensaje=Registro eliminado correctamente");
        exit();
    } else {
        echo "Error: El archivo no existe.";
    }
} else {
    echo "ID no proporcionado.";
}
?>

