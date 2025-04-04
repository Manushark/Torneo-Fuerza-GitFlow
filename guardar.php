<?php
require("library/engine.php");
$fighter = new fighter();
$fighter->identificacion = $_POST['identificacion'];
$fighter->nombre = $_POST['nombre'];
$fighter->apellido = $_POST['apellido'];
$fighter->fecha_nacimiento = $_POST['fecha_nacimiento'];
$fighter->foto = $_POST['foto'];

if (!empty($_POST['habilidades']['nombre']) && is_array($_POST['habilidades']['nombre'])) {
    foreach ($_POST['habilidades']['nombre'] as $i => $nombre) {
        $habilidad = new habilidades();
        $habilidad->nombre = $nombre;
        $habilidad->tipo = $_POST['habilidades']['tipo'][$i] ?? '';
        $habilidad->nivel = $_POST['habilidades']['nivel'][$i] ?? 0;
        $fighter->habilidades[] = $habilidad;
    }
} else {
    echo "⚠️ No se recibieron habilidades.";
}


guardar_datos($fighter -> identificacion, $fighter);
plantilla::aplicar();  
?>

<h1>¡💾Participante registrado!</h1>
<p>¡El participante ha sido registrado exitosamente!</p>

<div>
    <a href="index.php" class="boton">Volver al listado</a>
</div>