<?php
include("../tmp/funcoescrud.php");
?>
<?php
$func = $_GET['func'];



if ($func == "select") {
    cliente_select();
} else if ($func == "delete") {
    $codigo = $_GET['codigo'];
    cliente_delete($codigo);
    cliente_select();
} else if ($func == "alterar") {
    cliente_alterar($r1, $r2, $r3);
    cliente_select();
} else if ($func == "mostrafilhos") {
    $codigo = $_GET['codigo'];
    cliente_mostrafilho($codigo);
} else if ($func == "deletefilhos") {
    $codigofilho = $_GET['codigofilho'];
    $codigo = $_GET['codigo'];
    filho_delete($codigofilho);
    cliente_mostrafilho($codigo);
} else if ($func == "insertform") {
    cliente_select();
    echo'<table>';
    echo'<tr><td>Informe o nome do cliente: <input type="text" id="nome"></td></tr>';
    echo'<tr><td>Informe seu sexo:
                        <input type=radio name=sexo value="M" id="sexo"> M
                        <input type=radio name=sexo value="F" id="sexo"> F
                    </td></tr>';
    echo'<td>'
    ?>
    <select name = "cidade" id="select">
         <?php
        $conn = pg_connect("host=127.0.0.1 port = '5432' dbname = 'web1' user = 'postgres' password = '123'");
        $query = 'SELECT * FROM cidades';
        $result = pg_query($conn, $query);

        if ($result) {
            while ($row = pg_fetch_assoc($result)) {
                echo "<option value='" . $row['codigo'] . "'>" . $row['nome'] . "</option>";
            }
        }
        pg_close($conn);
        ?>
    </select>
    <?php
    '</td>';
    echo'<td><button onclick = "cliente_insert()">Enviar</td>';
    echo'</table >';
} else if ($func == "insert") {
    cliente_insert($_GET['nome'], $_GET['sexo'], $_GET['cidade']);
    cliente_select();
}
?>

