<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head> 
    <body>
        <form action="deletecidade.php" method="post">
             <?php
            $conn = pg_connect("host=127.0.0.1 port = '5432' dbname = 'web1' user = 'postgres' password = '123'");
            $query = 'SELECT * FROM cidades';
            $result = pg_query($conn, $query);
            echo '<table border = 1>';

            echo '<td>Código:</td><td>Nome:</td><td>Botão:</td>';
            if ($result) {
                while ($row = pg_fetch_assoc($result)) {
                    echo '<tr>';
                    echo '<td>' . $row['codigo'] . '</td><td>' . $row['nome'] . '</td>';
                    echo '<td><input type=radio name=deletar value=' . $row['codigo'] . '></td>';
                    echo '</tr>';
                }
            }
            echo'<tr><td colspan="2"><input type=submit name="submit" value="Inserir">';
            echo'<td><input type = submit name = submit value = "Deletar"></td></tr>';


            echo '</table>';
            pg_close($conn);
            ?> 

        </form>


    </body> 
</html> 
