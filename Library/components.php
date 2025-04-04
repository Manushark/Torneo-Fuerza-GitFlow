<?php

    function my_input($name, $label, $valor="", $extra =[]) {
        
        $type = "text";
        $required = "";

        extract($extra);

        return <<<HTML
        <div style="margin-bottom: 10px; text-align: left;">
            <label for="$name">$label:</label><br>
            <input {required} type="$type" name="$name" style="width: 355px" id="$name" value="$valor" required>
        </div>
    HTML;
    }

function guardar_datos($codigo, $datos) {
    if (!is_dir("datos")) {
        mkdir("datos");
    }

    file_put_contents("datos/{$codigo}.dat", serialize($datos));
}

function cargar_datos($codigo) {
    if (!file_exists("datos/{$codigo}.dat")) {
        return false;
    }
    $datos = file_get_contents("datos/{$codigo}.dat");
    return unserialize($datos);

}

function listar_registros() {
    $registros = [];
    if (!is_dir("datos")) {
        return $registros; // Retornar array vacío si no existe la carpeta
    }
    $archivos = scandir("datos");
    foreach ($archivos as $archivo) {
        if (!is_file("datos/{$archivo}")) {
            continue;
        }
        $codigo = str_replace(".dat", "", $archivo);
        $datos = cargar_datos($codigo);
        if ($datos !== false) { // Evitar agregar registros inválidos
            $registros[] = $datos;
        }
    }
    return $registros;
}
