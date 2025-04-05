<?php
    require('library/engine.php');  
    plantilla::aplicar();  
    $datos = listar_registros();

    $signos = [
        'aries' => 0,
        'tauro' => 0,
        'geminis' => 0,
        'cancer' => 0,
        'leo' => 0,
        'virgo' => 0,
        'libra' => 0,
        'escorpio' => 0,
        'sagitario' => 0,
        'capricornio' => 0,
        'acuario' => 0,
        'piscis' => 0
    ];
    foreach ($datos as $fighter) {
        $signo = $fighter->signo_zodiacal();
        $signos[$signo]++;
    }

?>

<h1>📈Estadistiscas</h1>

<style>
#tablaSuperior {
   text-align: center; 
}

</style>
<table style="width: 100%" id="tablaSuperior">
<tr>
    <td>
      <h1>  <?= count($datos) ?> 🤷‍♂️participantes </h1>
    </td>
    <td>
    <h1> 0  </h1>
    ❄️Habilidades
    </td>
    <td>
    <h1> 0  </h1>
     💪🏼H X guerreto
    </td>
    <td>
    <h1> 0  </h1>
    👴🏼Edad promedio
    </td>
</tr>


</table>

<h2>
    🌟Signos zodiacales
</h2>
<table>

    <?php

        foreach ($signos as $signo => $cantidad) {
            echo "
            <tr>
                <td>{$signo}</td>
                <td>{$cantidad}</td>
            </tr>
            ";
        }
    ?>
</table>