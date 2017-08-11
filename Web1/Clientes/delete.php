<?php
if ($_POST['submit'] == "Deletar") {
    if (!empty($_POST["deletar"])) {
        $conn = pg_connect("host=127.0.0.1 port = '5432' dbname = 'web1' user = 'postgres' password = '123'");
        $deletar = (int) $_POST["deletar"];
        $query = "DELETE FROM clientes where codigo='$deletar'";
        $result = pg_query($conn, $query);

        if (!$result) {

            printf("<h1>ERRO</h1>");
            $errormessage = pg_errormessage($conn);
            echo $errormessage;
            exit();
        }
        pg_close($conn);

        function execute($select) {
            include_once($select);
        }

        execute('select.php');
    } else {
        echo 'Selecione algum cliente!';

        function execute($select) {
            include_once($select);
        }

        execute('select.php');
    }
}

if ($_POST['submit'] == "Alterar") {
    if (!empty($_POST["deletar"])) {
        ?>
        <form action="alterar.php" method="post">
            <?php
            /* $sexoM = null;
              $sexoF = null;
              if ($_POST["sexohidden"] == 'M') {
              $sexoM = 'checked';
              } else if ($_POST["sexohidden"] == 'F') {
              $sexoF = 'checked';
              } */

            //print_r($_POST);
            // print_f("$_POST");

            $sexoM = "";
            $sexoF = "";
            ${'sexo' . $_POST["sexohidden"]} = "checked";

            echo '<table border = 1>';
            echo '<tr><td>Informe seu nome: <input type = text name = campo1 value=' . $_POST["nomehidden"] . '></td></tr>';
            echo '<tr><td>Informe seu sexo:';
            echo '<input type = radio name = sexo value = "M"' . $sexoM . ' > M';
            echo '<input type = radio name = sexo value = "F"' . $sexoF . ' > F';
            echo '<input type = hidden name = codigo value = ' . $_POST["deletar"] . ' ></td></tr>';
            echo '<tr><td>';
            ?>
            <select name = "cidade">
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

                echo '</td></tr>';
                ?>
            </select>
            <?php
            echo '<td colspan="0"><input type = submit name = "submit" value = "Enviar">';
            echo '<input type = submit name = "submit" value = "Adicionar filhos">';
            echo '<input type = submit name = "submit" value = "Deletar filhos" ></td>';
            echo '</table>';
            ?>
        </form >
        <?php
    } else {
        echo 'Selecione algum cliente!';

        function execute($select) {
            include_once($select);
        }

        execute('select.php');
    }
}
if ($_POST['submit'] == "Mostrar filhos") {

    $deletar = (int) $_POST["deletar"];

    function execute($mostrafilhos) {
        include_once($mostrafilhos);
    }

    execute('../filhos/mostrafilhos.php');
    ?>
    <?php
}

if ($_POST['submit'] == "Inserir") {

    function execute($clientes) {
        include_once($clientes);
    }

    execute('clientes.php');
}
?>


