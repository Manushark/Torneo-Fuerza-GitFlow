<?php
require("library/engine.php");
plantilla::aplicar();  

$fighter = new fighter();
if (isset($_GET['codigo'])) {
    $fighter = cargar_datos($_GET['codigo']);

    if(!$fighter) {
        echo "<h1>Registro no encontrado</h1>";
        echo "<div class='right'><a href='index.php' class='boton'>Volver</a></div>";
        exit;
    }
  }



?>
<h1>👾Registro de participantes</h1>
<p>Por favor, ingrese los datos del participante</p>

<?php if (isset($_GET['codigo']) && $fighter): ?>
  <div style="margin:10px;">
    <a href="eliminar.php?id=<?php echo $_GET['codigo']; ?>" 
       class="boton" 
       onclick="return confirm('¿Estás seguro de eliminar este participante?');">
      ❌ Eliminar
    </a>
  </div>
  
<?php endif; ?>

<form method="post" action="guardar.php">
  <?php 
    echo my_input("identificacion", "Identificación", $fighter->identificacion, ['required' => 'required']);
    echo my_input('nombre', 'Nombre', $fighter->nombre, ['required' => 'required']);
    echo my_input('apellido', 'Apellido', $fighter->apellido, ['required' => 'required']);
    echo my_input('fecha_nacimiento', 'Fecha de nacimiento',$fighter->fecha_nacimiento, ['type' => 'date']);
    echo my_input('foto', 'Foto', $fighter->foto, ['type' => 'url']);
  ?>
  <h3>❄️Habilidades</h3>
  <table>
    <thead>
      <tr>
        <th>Nombre</th>
        <th>Tipo</th>
        <th>Nivel</th>
        <td>
          <button type="button" onclick="agregarHabilidad()">+</button>
        </td>
      </tr>
    </thead>
    <tbody id="tdHabilidades">
    <?php
    
    if (!empty($fighter->habilidades) && is_array($fighter->habilidades)) {
        foreach ($fighter->habilidades as $habilidad) {
            echo "<tr>";
            echo "<td><input type='text' name='habilidades[nombre][]' value='{$habilidad->nombre}'></td>";
            echo "<td><input type='text' name='habilidades[tipo][]' value='{$habilidad->tipo}'></td>";
            echo "<td><input type='number' name='habilidades[nivel][]' value='{$habilidad->nivel}'></td>";
            echo "
            <td>
                <button onclick='quitarFila(this)'>💀</button>
            </td>
            ";
            echo "</tr>";
        }
    }
    ?>
</tbody>





  </table>
  
  <div style="margin:10px" bottom: 0px;>
     <button type="submit" Class="boton">Guardar</button>
  </div>
  
</form>

<script>
function agregarHabilidad() {
    var tr = document.createElement("tr");

    var td = document.createElement("td");
    var input = document.createElement("input");
    input.type = "text";
    input.name = "habilidades[nombre][]";  // ✔ Nombre correcto
    td.appendChild(input);
    tr.appendChild(td);

    var td = document.createElement("td");
    var input = document.createElement("input");
    input.type = "text";
    input.name = "habilidades[tipo][]";  // ✔ Nombre correcto
    td.appendChild(input);
    tr.appendChild(td);

    var td = document.createElement("td");
    var input = document.createElement("input");
    input.type = "number";
    input.name = "habilidades[nivel][]";  // ✔ Nombre correcto
    td.appendChild(input);
    tr.appendChild(td);

    var td = document.createElement("td");
    var button = document.createElement("button");
    button.innerHTML = "💀";
    button.type = "button";
    button.setAttribute("onclick", "quitarFila(this)");
    td.appendChild(button);
    tr.appendChild(td);

    document.getElementById("tdHabilidades").appendChild(tr);
}

  function quitarFila(boton) {
    if (confirm("¿Estás seguro de eliminar esta habilidad?")) {
      boton.parentElement.parentElement.remove();
    }
  boton.parentElement.parentElement.remove();
}
</script>
