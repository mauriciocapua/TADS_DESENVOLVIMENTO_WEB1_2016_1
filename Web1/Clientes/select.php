<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head> 
    <body>
        <form action="delete.php" method="post">
             <?php
            $conn = pg_connect("host=127.0.0.1 port = '5432' dbname = 'web1' user = 'postgres' password = '123'");
            $query = 'select clientes.codigo, clientes.nome, clientes.sexo, cidades.nome as nome_cidade from clientes inner join cidades on (cod_cidade = cidades.codigo)';
            $result = pg_query($conn, $query);
            echo '<table border = 1>';

            echo '<td>Código:</td><td>Nome:</td><td>Sexo:</td><td>Cidade:</td><td>Botão:</td>';
            if ($result) {
                while ($row = pg_fetch_assoc($result)) {
                    echo '<tr>';
                    echo '<td>' . $row['codigo'] . '</td><td>' . $row['nome'] . '</td><td>' . $row['sexo'] . '</td><td>' . $row['nome_cidade'] . '</td>';
                    echo '<td><input type=radio name=deletar value=' . $row['codigo'] . '></td>';
                    echo'<input type = hidden name=nomehidden value=' . $row['nome'] . '>';
                    echo '<input type = hidden name=sexohidden value=' . $row['sexo'] . '>';
                    echo '</tr>';
                }
            }
            echo'<tr><td colspan="5"><input type = submit name = submit value = "Deletar">';
            echo'<input type = submit name = submit value = "Alterar">';
            echo'<input type = submit name = submit value = "Mostrar filhos">';
            echo'<input type=submit name="submit" value="Inserir"></td></tr>';
            echo '</table>';


            pg_close($conn);
            ?> 

        </form>

    </body> 
</html> 
