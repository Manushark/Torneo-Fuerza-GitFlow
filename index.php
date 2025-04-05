<?php
    require('library/engine.php');  
    plantilla::aplicar();  
?>

        <h1>¡Bienvenido al torneo de la fuerza💪🏼⚡!</h1>
        <p>¡Participa en el torneo de la fuerza y demuestra que eres el guerrero más fuerte de todos!</p>
       
        

    </div>

    <div class="right">
        <a href="registers.php">Registrarse</a>
        <a href="panel.php">📈Estadistiscas</a>
    </div>
    <table>
        <thead>
            <tr>
                <th>Foto</th>
                <th>Nombre</th>
                <th>Edad</th>
                <th>Signo zodiacal</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        <?php
            $datos = listar_registros();

            foreach ($datos as $fighter){
                echo"
                <tr>
                    <td><img src='{$fighter->foto}' alt='{$fighter->nombre}' width='50'></td>
                    <td>{$fighter->nombre} {$fighter->apellido}</td>
                    <td>{$fighter->edad()}</td>
                    <td>{$fighter->signo_zodiacal()}</td>
                    <td><a href='registers.php?codigo={$fighter->identificacion}'>Editar</a></td>
                </tr>
                ";
            }
        ?>
        </tbody>
    </table>
