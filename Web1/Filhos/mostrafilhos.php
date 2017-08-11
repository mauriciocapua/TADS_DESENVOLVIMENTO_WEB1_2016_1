<form action="select.php" method="post">
    <?php
    $conn = pg_connect("host=127.0.0.1 port = '5432' dbname = 'web1' user = 'postgres' password = '123'");
    $deletar = (int) $_POST["deletar"];
    $query = "SELECT * FROM filhos where id_clientes =$deletar";
    $result = pg_query($conn, $query);
    echo '<table border = 1>';
    echo '<td>Código cliente:</td><td>Código filho:</td><td>Nome:</td>';
    if ($result) {
        while ($row = pg_fetch_assoc($result)) {
            echo '<tr>';
            echo '<td>' . $row['id_clientes'] . '</td><td>' . $row['codigo'] . '</td><td>' . $row['nome'] . '</td>';
            //echo '<td><input type=radio name=deletar value="' . $row['codigo'] . '"><tr>';
            echo '</tr>';
        }
    }
    echo '</table>';
    pg_close($conn);
    echo '<input type = submit name = submit value = "Voltar para clientes">';
    ?> 
</form>
