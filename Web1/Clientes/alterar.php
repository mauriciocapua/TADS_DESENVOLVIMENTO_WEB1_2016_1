<?php
$r1 = $_POST["campo1"];

$alt = $_POST["codigo"];
$cidade = $_POST["cidade"];


$conn = pg_connect("host=127.0.0.1 port = '5432' dbname = 'web1' user = 'postgres' password = '123'");
if ($_POST['submit'] == "Enviar") {
    $r2 = $_POST["sexo"];
    pg_query($conn, "update clientes set nome = '$r1', sexo ='$r2', cod_cidade=$cidade where codigo = '$alt'");

    pg_close($conn);

    function execute($select) {
        include_once($select);
    }

    execute('select.php');
}
if ($_POST['submit'] == "Adicionar filhos") {
    ?>
<form action="../filhos/insertfilho.php" method="post">
        <?php
        $guardar = $_POST["codigo"];

        echo '<table>';

        echo '<tr><td>Informe seu nome: <input type = text name = campo1 required></td></tr>';
        echo '<tr><td><input type = hidden name = codigo value =' . $guardar . '></td></tr>';
        echo '</td></tr>';
        echo '</table>';
        echo '<input type = submit name = "submit" value = "Enviar">';
        ?>
    </form >
    <?php
}
if ($_POST['submit'] == "Deletar filhos") {
    ?>

    <form action = "../filhos/deletafilhos.php" method = "post">
        <?php
        $conn = pg_connect("host=127.0.0.1 port = '5432' dbname = 'web1' user = 'postgres' password = '123'");
        $deletar = (int) $_POST["codigo"];
        $query = "SELECT * FROM filhos where id_clientes =$deletar";
        $result = pg_query($conn, $query);
        echo '<table border = 1>';
        echo '<td>Código cliente:</td><td>Código filho:</td><td>Nome:</td>';
        if ($result) {
            while ($row = pg_fetch_assoc($result)) {
                echo '<tr>';
                echo '<td>' . $row['id_clientes'] . '</td><td>' . $row['codigo'] . '</td><td>' . $row['nome'] . '</td>';
                echo '<td><input type=radio name=deletar value="' . $row['codigo'] . '"><tr>';
                echo '</tr>';
            }
        }
        echo '</table>';
        pg_close($conn);
        echo '<input type = submit name = submit value = "Deletar">';
        ?> 
    </form>
    <?php
}
?> 

